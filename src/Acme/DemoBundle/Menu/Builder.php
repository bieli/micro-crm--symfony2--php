<?php

namespace Acme\DemoBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('mainMenu');

        $menu->addChild('Kokpit', array('route' => '/micro-crm/dashboard'));

        $menu->addChild('Klienci', array(
            'route' => '/micro-crm/customer',
//            'routeParameters' => array('id' => 42)
        ));

        $menu->addChild('Zdarzenia', array(
            'route' => '/micro-crm/event'
        ));

        $menu->addChild('Sprzedawcy', array(
            'route' => '/micro-crm/seller'
        ));

        return $menu;
    }
}

