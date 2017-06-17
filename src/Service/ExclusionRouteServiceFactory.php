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
use Jgut\Zf\Maintenance\Exclusion\RouteExclusion;

/**
 * Factory responsible of instantiating {@see Jgut\Zf\Maintenance\Exclusion\RouteExclusion}
 */
class ExclusionRouteServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return RouteExclusion
     * @throws \InvalidArgumentException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this->__invoke($serviceLocator, "ExclusionRouteServiceFactory");
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $options    = $container->get('ZfMaintenanceOptions');
        $exclusions = $options->getExclusions();

        if (!isset($exclusions['ZfMaintenanceRouteExclusion'])) {
            throw new \InvalidArgumentException('Config for "Jgut\Zf\Maintenance\Exclusion\RouteExclusion" not set');
        }

        $routes     = $exclusions['ZfMaintenanceRouteExclusion'];
        $routeMatch = $container->get('Application')->getMvcEvent()->getRouteMatch();

        return new RouteExclusion($routes, $routeMatch);
    }
}
