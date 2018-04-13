<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Filter\Initializer;

use Interop\Container\ContainerInterface;
use MSBios\Filter\FilterManagerAwareInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class FilterManagerInitializer
 * @package MSBios\Filter\Initializer
 */
class FilterManagerInitializer implements InitializerInterface
{
    /**
     * Initialize the given instance
     *
     * @param  ContainerInterface $container
     * @param  object $instance
     * @return void
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof FilterManagerAwareInterface) {
            $instance->setFilterManager(
                $container->get('FilterManager')
            );
        }
    }

    /**
     * @param $an_array
     * @return FilterManagerInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
