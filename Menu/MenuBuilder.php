<?php
/**
 * Created by PhpStorm.
 * User: soiposervices
 * Date: 30/11/15
 * Time: 13:41
 */

namespace Soipo\Okento\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Translation\Translator;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\Event;
use Soipo\Okento\AdminBundle\Event\AdminMenuEvent;
use Soipo\Okento\AdminBundle\Event\MenuEvent;


class MenuBuilder extends Event
{
    protected $factory;
    protected $translator;
    protected $eventDispatcher;
    protected $menuName;

    /**
     * @param FactoryInterface $factory
     * @param Translator $translator
     * @param EventDispatcherInterface $eventDispatcher
     * @param string $menuName
     */
    public function __construct(FactoryInterface $factory, Translator $translator, EventDispatcherInterface $eventDispatcher, $menuName = 'sidebar-menu')
    {
        $this->factory = $factory;
        $this->translator = $translator;
        $this->eventDispatcher = $eventDispatcher;
        $this->menuName = $menuName;
    }

    /**
     * Used if we need to change the menName after the object has been initialized
     * @param $menuName
     */
    public function setMenuName($menuName){
        $this->menuName = $menuName;
    }

    public function createSidebarMenu(array $options)
    {

        $menuItem =  $this->factory->createItem($this->menuName)->setChildrenAttribute('class', $this->menuName);
        $event = new AdminMenuEvent($menuItem);
        $this->eventDispatcher->dispatch(MenuEvent::OKENTO_ADMIN_MENU, $event);

        return $event->getMenu();
    }


}