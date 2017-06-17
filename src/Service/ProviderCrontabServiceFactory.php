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
use Jgut\Zf\Maintenance\Provider\CrontabProvider;

/**
 * Factory responsible of instantiating {@see Jgut\Zf\Maintenance\Provider\CrontabProvider}
 */
class ProviderCrontabServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return CrontabProvider
     * @throws \InvalidArgumentException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this->__invoke($serviceLocator, "ProviderCrontabServiceFactory");
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $options   = $container->get('ZfMaintenanceOptions');
        $providers = $options->getProviders();

        if (!isset($providers['ZfMaintenanceCrontabProvider'])) {
            throw new \InvalidArgumentException(
                'Config for "Jgut\Zf\Maintenance\Provider\CrontabProvider" not set'
            );
        }

        $provider = new CrontabProvider();

        $provider->setBlock($options->isBlocked());

        $providerConfig = $providers['ZfMaintenanceCrontabProvider'];

        if (isset($providerConfig['message'])) {
            $provider->setMessage($providerConfig['message']);
        }

        if (!isset($providerConfig['expression'])) {
            throw new \InvalidArgumentException(
                'Expression for "Jgut\Zf\Maintenance\Provider\CrontabProvider" not set'
            );
        }
        $provider->setExpression($providerConfig['expression']);

        if (!isset($providerConfig['interval'])) {
            throw new \InvalidArgumentException(
                'Interval for "Jgut\Zf\Maintenance\Provider\CrontabProvider" not set'
            );
        }

        $provider->setInterval($providerConfig['interval']);

        return $provider;
    }
}
