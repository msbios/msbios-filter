<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Filter\File;

use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\ImagineInterface;
use MSBios\Imagine\GdAwareInterface;
use MSBios\Imagine\ImagineAwareTrait;
use Zend\Filter\AbstractFilter;

/**
 * Class Resize
 * @package MSBios\Filter\File
 */
class Resize extends AbstractFilter
{
    use ImagineAwareTrait;

    /** @var array */
    protected $options = [
        'width' => 480,
        'height' => 320,
        'filter' => ImageInterface::FILTER_UNDEFINED
    ];

    /**
     * Resize constructor.
     * @param ImagineInterface $imagine
     * @param array $options
     */
    public function __construct(ImagineInterface $imagine, array $options)
    {
        $this->setImagine($imagine);
        $this->setOptions($options);
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->options['width'] = $width;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->options['width'];
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->options['height'] = $height;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->options['height'];
    }

    /**
     * @param $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->options['filter'] = $filter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->options['filter'];
    }

    /**
     * @param mixed $value
     * @return array
     */
    public function filter($value)
    {
        /** @var ImagineInterface $imagine */
        $imagine  = $this->getImagine();

        /** @var ImageInterface $image */
        $image = $imagine->open($value);

        /** @var BoxInterface $box */
        $box = new Box($this->getWidth(), $this->getHeight());

        $image->resize($box, $this->getFilter());
        $image->save($value);

        return [
            'target' => $value,
            'width' => $this->getWidth(),
            'height' => $this->getHeight()
        ];
    }
}
