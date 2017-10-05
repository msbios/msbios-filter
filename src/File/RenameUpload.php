<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter\File;

use Zend\Filter\File\RenameUpload as DefaultRenameUpload;

/**
 * Class RenameUpload
 * @package MSBios\Filter\File
 */
class RenameUpload extends DefaultRenameUpload
{
    /** @const number */
    const DEFAULT_DEPTH = 0;

    /** @const number */
    const DEFAULT_LENGTH = 0;

    /** @const number */
    const CAMELCASE_LOWER = -1;
    const CAMELCASE_RANDOM = 0;
    const CAMELCASE_UPPER = 1;

    /** @var array */
    protected $targetOptions = [
        'depth' => self::DEFAULT_DEPTH,
        'length' => self::DEFAULT_LENGTH,
        'camel_case' => self::CAMELCASE_RANDOM
    ];

    /**
     * @param $depth
     * @return $this
     */
    public function setDepth($depth)
    {
        $this->targetOptions['depth'] = $depth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->targetOptions['depth'];
    }

    /**
     * @param $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->targetOptions['length'] = $length;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->targetOptions['length'];
    }

    /**
     * @param $camelCase
     * @return $this
     */
    public function setCamelCase($camelCase)
    {
        $this->targetOptions['camel_case'] = $camelCase;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCamelCase()
    {
        return $this->targetOptions['camel_case'];
    }

    /**
     * @return array
     */
    public function getTargetOptions()
    {
        return $this->targetOptions;
    }

    /**
     * @param string $target
     * @return DefaultRenameUpload
     */
    public function setTarget($target)
    {
        if (is_array($target)) {
            $this->setOptions($target);
            $target = $target['pathname'];
        }

        return parent::setTarget($target); // TODO: Change the autogenerated stub
    }

    /**
     * @param array $uploadData
     * @return string
     */
    protected function getFinalTarget($uploadData)
    {
        if ($this->getDepth()) {
            /** @var array $depth */
            $depth = [];

            for ($i = 0; $i < $this->getDepth(); $i++) {
                $depth[] = $this->random($this->getLength());
            }

            /** @var string $target */
            $target = $this->getTarget()
                . implode(DIRECTORY_SEPARATOR, $depth)
                . DIRECTORY_SEPARATOR;

            $this->setTarget($target);

            if (!is_dir($target)) {
                mkdir($target, 0755, true);
            }
        }

        return parent::getFinalTarget($uploadData); // TODO: Change the autogenerated stub
    }

    /**
     * @param int $length
     * @return string
     */
    protected function random($length = self::DEFAULT_LENGTH)
    {
        /** @var string $characters */
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}