<?php


namespace Soipo\Okento\AdminBundle\Event;


final class MenuEvent
{
    /**
     * The okento.admin.menu event is thrown each time an the admin menu needs to be rendered is created
     * in the system.
     *
     * The event listener receives an
     * Soipo\Okento\AdminBundle\Event\AdminMenu instance.
     *
     * @var string
     */
    const OKENTO_ADMIN_MENU = 'okento.admin_menu';
}

