<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter\Decode;

use Zend\Filter\Exception;
use Zend\Filter\FilterInterface;
use Zend\Json\Decoder;
use Zend\Json\Exception\RuntimeException;

/**
 * Class Json
 * @package MSBios\Filter\Decode
 */
class Json implements FilterInterface
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
        try {
            return Decoder::decode(
                $value,
                \Zend\Json\Json::TYPE_ARRAY
            );
        } catch (RuntimeException $exception) {
            return [];
        }

        // /** @var array $result */
        // $result = json_decode($value, true);
        //
        // if ((json_last_error() != JSON_ERROR_NONE)) {
        //
        //     /** @var array $result */
        //     return [];
        // }
        //
        // return $result;
    }
}
