<?php

namespace Silverback\ApiComponentBundle\Entity\Navigation\Route;

interface RouteAwareInterface
{
    /**
     * @param Route $route
     * @return RouteAwareTrait|RouteAwareInterface
     */
    public function addRoute(Route $route);

    /**
     * @param Route $route
     * @return RouteAwareTrait|RouteAwareInterface
     */
    public function removeRoute(Route $route);
}
