<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */

namespace MSBios\Filter;

use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'filters' => [
        'factories' => [

            // files
            File\RenameUpload::class =>
                InvokableFactory::class,

            // json
            Json\Decoder::class =>
                InvokableFactory::class,
            Json\Encoder::class =>
                InvokableFactory::class,

            BooleanToInt::class =>
                InvokableFactory::class
        ]
    ]
];
