<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Filter\Word;

use Zend\Filter\Word\CamelCaseToSeparator;

/**
 * Class CamelCaseToBlank
 * @package MSBios\Filter\Word
 */
class CamelCaseToBlank extends CamelCaseToSeparator
{
    /**
     * CamelCaseToBlank constructor.
     * @param string $separator
     */
    public function __construct($separator = '')
    {
        parent::__construct($separator);
    }
}