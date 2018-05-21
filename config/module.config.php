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
            File\RenameUpload::class =>
                InvokableFactory::class,
            Json\Decoder::class =>
                InvokableFactory::class,
            Json\Encoder::class =>
                InvokableFactory::class,
            BooleanToInt::class =>
                InvokableFactory::class
        ]
    ],

    Module::class => [
        // ...
    ]
];
