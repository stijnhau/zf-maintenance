<?php
/**
 * Juliangut Zend Framework Maintenance Module (https://github.com/juliangut/zf-maintenance)
 *
 * @link https://github.com/juliangut/zf-maintenance for the canonical source repository
 * @license https://github.com/juliangut/zf-maintenance/blob/master/LICENSE
 */

namespace Jgut\Zf\Maintenance\View;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Jgut\Zf\Maintenance\Provider\ProviderInterface;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\Http\Response as HttpResponse;
use Zend\View\Model\ViewModel;

/**
 * Maintenance view strategy for maintenance mode
 */
class MaintenanceStrategy implements ListenerAggregateInterface
{
    /**
     * Maintenance template
     *
     * @var string
     */
    protected $template;

    /**
     * List of callback listeners
     *
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();

    /**
     * @param string $template
     */
    public function __construct($template)
    {
        $this->template = (string) $template;
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onDispatchError'), -10000);
    }

    /**
     * {@inheritDoc}
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * Modifies the response object with maintenance content.
     *
     * @param MvcEvent $event
     */
    public function onDispatchError(MvcEvent $event)
    {
        // Do nothing if the result is a response object
        $result   = $event->getResult();
        $response = $event->getResponse();
        if ($result instanceof Response || ($response && !$response instanceof HttpResponse)) {
            return;
        }

        if ($event->getError() !== ProviderInterface::ERROR) {
            return;
        }

        $viewVariables = array(
            'message' => $event->getParam('message'),
        );

        $model = new ViewModel($viewVariables);
        $model->setTemplate($this->getTemplate());

        $event->getViewModel()->clearChildren();
        $event->getViewModel()->addChild($model);

        $response = $response ?: new HttpResponse();
        $response->setStatusCode(HttpResponse::STATUS_CODE_503);
        $response->getHeaders()->addHeaderLine('Retry-After', 3600);

        $event->setResponse($response);
    }

    /**
     * Set maintenance template
     *
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = (string) $template;
    }

    /**
     * Get maintenance template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
