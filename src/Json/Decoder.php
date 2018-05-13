<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter\Json;

use Zend\Filter\FilterInterface;
use Zend\Json\Decoder as JsonDecoder;
use Zend\Json\Exception\RuntimeException;
use Zend\Json\Json;

/**
 * Class Decoder
 * @package MSBios\Filter\Json
 */
class Decoder implements FilterInterface
{
    /**
     * @param mixed $value
     * @return array|mixed
     */
    public function filter($value)
    {
        try {
            return JsonDecoder::decode(
                $value,
                Json::TYPE_ARRAY
            );
        } catch (RuntimeException $exception) {
            return [];
        }
    }
}
