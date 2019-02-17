<?php

// Change the namespace according to the location of this class in your bundle
namespace AppBundle\Listeners;

use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginListener
{
    protected $router;
    protected $security;
    protected $dispatcher;

    public function __construct(Router $router, SecurityContext $security, EventDispatcher $dispatcher)
    {
        $this->router = $router;
        $this->security = $security;
        $this->dispatcher = $dispatcher;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $this->dispatcher->addListener(KernelEvents::RESPONSE, array($this, 'onKernelResponse'));
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if ($this->security->isGranted('ROLE_FACTORY'))
        {
            $response = new RedirectResponse($this->router->generate('factory_homepage'));
        }
        elseif ($this->security->isGranted('ROLE_CUSTOMER'))
        {
            $response = new RedirectResponse($this->router->generate('customer_homepage'));
        }
        else
        {
            $response = new RedirectResponse($this->router->generate('default_homepage'));
        }

        $event->setResponse($response);
    }
}