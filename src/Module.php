<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter;

use Zend\Stdlib\ArrayUtils;

/**
 * Class Module
 * @package MSBios\Filter
 */
class Module extends \MSBios\Module
{
    /** @const VERSION */
    const VERSION = '1.0.19';

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getDir()
    {
        return __DIR__;
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }

    /**
     * @inheritdoc
     *
     * @return array|mixed|\Traversable
     */
    public function getConfig()
    {
        return ArrayUtils::merge(
            parent::getConfig(),
            [
            'service_manager' => (new ConfigProvider)->getDependencyConfig()
            ]
        );
    }
}
