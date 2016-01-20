<?php

namespace Soipo\Okento\AdminBundle\Event;

use Knp\Menu\FactoryInterface;
use Symfony\Component\EventDispatcher\Event;

class AdminMenuEvent extends Event
{
    protected $menu;

    public function __construct(\Knp\Menu\MenuItem $menu)
    {
            $this->menu = $menu;
    }

    public  function getMenu(){
        return $this->menu;
    }

    public function setMenu($menu){
        $this->menu = $menu;
        return $this;
    }

    /**
     * @param $menuName
     * @return mixed
     */
    public function getdMenu(){

        if(is_array($this->menuList) && array_key_exists($menuName,$this->menuList)){

            $children = $this->menuList[$menuName];
            foreach ( $children as $index => $child ) {

                if(array_key_exists('role',$child) && !$this->authorizationChecker->isGranted($child['role'])){
                    continue;
                }

                $name = array_key_exists('name',$child)? $child['name']: $menuName.'_'.$index;

                $parameters = array();

                if(array_key_exists('label',$child)){
                    $label = $child['label'];
                    $parameters['label'] = $this->translator->trans($label);
                }
                if(array_key_exists('route',$child)){
                    $route = $child['route'];
                    $parameters['route'] = $route;
                }

                $menu->addChild($name, $parameters);

                if(array_key_exists('icon',$child)){
                    $icon = $child['icon'];
                    $menu[$name]->setAttribute('icon',$icon);
                }

                if( array_key_exists('parent',$child)){
                    $parent = $child['parent'];
                        if(array_key_exists($parent,$menu)){
                            $menu[$parent]->addChild();
                    }
                }


            }

            return $menu;

        }
    }
}