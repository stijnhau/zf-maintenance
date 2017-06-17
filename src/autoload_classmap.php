<?php
/**
 * Juliangut Zend Framework Maintenance Module Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://github.com/juliangut/zf-maintenance/blob/master/LICENSE
 */

return array(
    'Jgut\Zf\Maintenance\Module'
    => __DIR__ . '/Module.php',

    'Jgut\Zf\Maintenance\Exception\MaintenanceException'
    => __DIR__ . '/Exception/MaintenanceException.php',

    'Jgut\Zf\Maintenance\Options\ModuleOptions'
    => __DIR__ . '/Options/ModuleOptions.php',

    'Jgut\Zf\Maintenance\Collector\MaintenanceCollector'
    => __DIR__ . '/Collector/MaintenanceCollector.php',

    'Jgut\Zf\Maintenance\Exclusion\ExclusionInterface'
    => __DIR__ . '/Exclusion/ExclusionInterface.php',
    'Jgut\Zf\Maintenance\Exclusion\IpExclusion'
    => __DIR__ . '/Exclusion/IpExclusion.php',
    'Jgut\Zf\Maintenance\Exclusion\RouteExclusion'
    => __DIR__ . '/Exclusion/RouteExclusion.php',

    'Jgut\Zf\Maintenance\Provider\AbstractProvider'
    => __DIR__ . '/Provider/AbstractProvider.php',
    'Jgut\Zf\Maintenance\Provider\ConfigProvider'
    => __DIR__ . '/Provider/ConfigProvider.php',
    'Jgut\Zf\Maintenance\Provider\ConfigScheduledProvider'
    => __DIR__ . '/Provider/ConfigScheduledProvider.php',
    'Jgut\Zf\Maintenance\Provider\CrontabProvider'
    => __DIR__ . '/Provider/CrontabProvider.php',
    'Jgut\Zf\Maintenance\Provider\EnvironmentProvider'
    => __DIR__ . '/Provider/EnvironmentProvider.php',
    'Jgut\Zf\Maintenance\Provider\FileProvider'
    => __DIR__ . '/Provider/FileProvider.php',
    'Jgut\Zf\Maintenance\Provider\ProviderInterface'
    => __DIR__ . '/Provider/ProviderInterface.php',
    'Jgut\Zf\Maintenance\Provider\ScheduledProviderInterface'
    => __DIR__ . '/Provider/ScheduledProviderInterface.php',

    'Jgut\Zf\Maintenance\Service\ExclusionIpServiceFactory'
    => __DIR__ . '/Service/ExclusionIpServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ExclusionRouteServiceFactory'
    => __DIR__ . '/Service/ExclusionRouteServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\MaintenanceCollectorServiceFactory'
    => __DIR__ . '/Service/MaintenanceCollectorServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\MaintenanceStrategyServiceFactory'
    => __DIR__ . '/Service/MaintenanceStrategyServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ModuleOptionsServiceFactory'
    => __DIR__ . '/Service/ModuleOptionsServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ProviderConfigScheduledServiceFactory'
    => __DIR__ . '/Service/ProviderConfigScheduledServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ProviderConfigServiceFactory'
    => __DIR__ . '/Service/ProviderConfigServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ProviderCrontabServiceFactory'
    => __DIR__ . '/Service/ProviderCrontabServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ProviderEnvironmentServiceFactory'
    => __DIR__ . '/Service/ProviderEnvironmentServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ProviderFileServiceFactory'
    => __DIR__ . '/Service/ProviderFileServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ViewMaintenanceMessageServiceFactory'
    => __DIR__ . '/Service/ViewMaintenanceMessageServiceFactory.php',
    'Jgut\Zf\Maintenance\Service\ViewScheduledMaintenanceServiceFactory'
    => __DIR__ . '/Service/ViewScheduledMaintenanceServiceFactory.php',

    'Jgut\Zf\Maintenance\View\MaintenanceStrategy'
    => __DIR__ . '/View/MaintenanceStrategy.php',
    'Jgut\Zf\Maintenance\View\Helper\AbstractHelper'
    => __DIR__ . '/View/Helper/AbstractHelper.php',
    'Jgut\Zf\Maintenance\View\Helper\MaintenanceMessage'
    => __DIR__ . '/View/Helper/MaintenanceMessage.php',
    'Jgut\Zf\Maintenance\View\Helper\ScheduledMaintenance'
    => __DIR__ . '/View/Helper/ScheduledMaintenance.php',
);
