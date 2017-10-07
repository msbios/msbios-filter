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
            Decode\Json::class =>
                InvokableFactory::class,
            File\RenameUpload::class =>
                InvokableFactory::class
        ]
    ],

    Module::class => [

    ]
];
