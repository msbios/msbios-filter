<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter;

use Zend\Filter\Exception;
use Zend\Filter\FilterInterface;

/**
 * Class BooleanToInt
 * @package MSBios\Filter
 */
class BooleanToInt implements FilterInterface
{
    /**
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
        return $value ? 1 : 0;
    }
}
