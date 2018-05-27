<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter\Json;

use Zend\Filter\FilterInterface;

/**
 * Class Encoder
 * @package MSBios\Filter\Json
 */
class Encoder implements FilterInterface
{
    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function filter($value)
    {

        if (is_array($value)) {
            $value = \Zend\Json\Encoder::encode($value);
        }

        return $value;
    }
}
