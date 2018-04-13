<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Filter;
use Zend\ServiceManager\PluginManagerInterface;

/**
 * Interface FilterManagerAwareInterface
 * @package MSBios\Filter
 */
interface FilterManagerAwareInterface
{
    /**
     * @return PluginManagerInterface
     */
    public function getFilterManager(): PluginManagerInterface;

    /**
     * @param PluginManagerInterface $filterManager
     * @return $this
     */
    public function setFilterManager(PluginManagerInterface $filterManager);
}