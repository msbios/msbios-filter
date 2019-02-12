<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Filter;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class FilterManagerInitializer
 * @package MSBios\Filter
 */
class FilterManagerInitializer implements InitializerInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param object $instance
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
     * @inheritdoc
     *
     * @param $an_array
     * @return FilterManagerInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}
