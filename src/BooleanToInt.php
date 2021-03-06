<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter;

use Zend\Filter\FilterInterface;

/**
 * Class BooleanToInt
 * @package MSBios\Filter
 */
class BooleanToInt implements FilterInterface
{
    /**
     * @inheritdoc
     *
     * @param mixed $value
     * @return int|mixed
     */
    public function filter($value)
    {
        return $value ? 1 : 0;
    }
}
