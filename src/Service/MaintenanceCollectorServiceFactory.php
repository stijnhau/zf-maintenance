<?php
/**
 * Juliangut Zend Framework Maintenance Module Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://github.com/juliangut/zf-maintenance/blob/master/LICENSE
 */

namespace Jgut\Zf\Maintenance\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Jgut\Zf\Maintenance\Collector\MaintenanceCollector;

/**
 * Factory responsible of instantiating {@see Jgut\Zf\Maintenance\Collector\MaintenanceCollector}
 */
class MaintenanceCollectorServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return MaintenanceCollector
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this->__invoke($serviceLocator, "MaintenanceCollectorServiceFactory");
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get('ZfMaintenanceOptions');

        return new MaintenanceCollector($options->getProviders());
    }
}
