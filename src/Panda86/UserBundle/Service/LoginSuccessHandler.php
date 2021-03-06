<?php

namespace Panda86\UserBundle\Service;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Http\Authentication\Response;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected $router;
    protected $security;

    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('category_index'));
        }
        elseif ($this->security->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('category_index'));
        }
        elseif ($this->security->isGranted('ROLE_USER'))
        {
            // redirect the user to where they were before the login process begun.
            $referer_url = $request->headers->get('referer');

            $response = new RedirectResponse($referer_url);
        }

        return $response;
    }

}