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

            Json\Decode::class =>
                InvokableFactory::class,
            Json\Encoder::class =>
                InvokableFactory::class,
        ]
    ],

    Module::class => [

    ]
];
