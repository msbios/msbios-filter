<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter;

use Zend\Filter\FilterInterface;

/**
 * Class AddSlashes
 * @package MSBios\Filter
 */
class AddSlashes implements FilterInterface
{
    /**
     * @inheritdoc
     *
     * @param mixed $value
     * @return mixed|string
     */
    public function filter($value)
    {
        // Do not filter non-string values
        if (! is_string($value)) {
            return $value;
        }

        return addslashes((string) $value);
    }
}
