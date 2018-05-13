<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter\Json;

use MSBios\Filter\Exception\InvalidArgumentException;
use Zend\Filter\FilterInterface;

/**
 * Class Encoder
 * @package MSBios\Filter\Json
 */
class Encoder implements FilterInterface
{
    /**
     * @param mixed $value
     * @return string
     */
    public function filter($value)
    {
        if (! is_array($value)) {
            throw new InvalidArgumentException('Parameter must be array');
        }

        return \Zend\Json\Encoder::encode($value);
    }
}
