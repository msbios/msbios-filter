<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter\File;

use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\ManipulatorInterface;
use MSBios\Imagine\GdAwareInterface;
use MSBios\Imagine\ImagineAwareTrait;

/**
 * Class ThumbnailUpload
 * @package MSBios\Filter\File
 */
class ThumbnailUpload extends RenameUpload implements GdAwareInterface
{
    use ImagineAwareTrait;

    /** @var array */
    protected $thumbnailOptions = [
        'width' => null, // size
        'height' => null, // size
        'mode' => ManipulatorInterface::THUMBNAIL_INSET,
        'filter' => ImageInterface::FILTER_UNDEFINED
    ];

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->thumbnailOptions['width'];
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->thumbnailOptions['height'];
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->thumbnailOptions['mode'];
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->thumbnailOptions['filter'];
    }

    /**
     * @param $options
     * @return $this
     */
    public function setThumbnail($options)
    {
        $this->thumbnailOptions = $options;
        return $this;
    }

    /**
     * @return array
     */
    public function getThumbnail()
    {
        return $this->thumbnailOptions;
    }

    /**
     * @param array|string $value
     * @return array
     */
    public function filter($value)
    {
        /** @var array $result */
        $result = parent::filter($value);

        /** @var string $thumb */
        $thumb = $this->getTarget() . 'thumb/';

        if (! is_dir($thumb)) {
            mkdir($thumb, 0777, true);
        }

        /** @var string $path */
        $path = str_replace($this->getTarget(), $thumb, $result['tmp_name']);

        /** @var BoxInterface $box */
        $box = new Box($this->thumbnailOptions['width'], $this->thumbnailOptions['height']);

        /** @var ImageInterface $image */
        $image = $this->getImagine()->open($result['tmp_name']);
        $image->thumbnail($box, $this->getMode(), $this->getFilter());
        $image->save($path);

        // TODO:
        $result['thumb'] = [
            'tmp_name' => $path,
            'width' => $box->getWidth(),
            'height' => $box->getHeight()
        ];

        return $result;
    }
}
