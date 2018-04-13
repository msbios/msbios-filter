<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter;
use Zend\ServiceManager\PluginManagerInterface;

/**
 * Trait FilterManagerAwareTrait
 * @package MSBios\Filter
 */
trait FilterManagerAwareTrait
{
    /** @var PluginManagerInterface */
    protected $filterManager;

    /**
     * @return PluginManagerInterface
     */
    public function getFilterManager(): PluginManagerInterface
    {
        return $this->filterManager;
    }

    /**
     * @param PluginManagerInterface $filterManager
     * @return $this
     */
    public function setFilterManager(PluginManagerInterface $filterManager)
    {
        $this->filterManager = $filterManager;
        return $this;
    }
}