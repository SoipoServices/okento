<?php
/**
 * Created by PhpStorm.
 * User: soiposervices
 * Date: 16/01/16
 * Time: 18:09
 */

namespace Soipo\Okento\AdminBundle\Event;


use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

abstract class AbstractAdminMenuListener
{
    protected  $tokenStorage;

    public function __construct(TokenStorage $tokenStorage){
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return mixed
     */
    public function getCurrentUser(){
        return $this->tokenStorage->getToken()->getUser();
    }

    /**
     * Check user role
     * @param $role
     * @return bool
     */
    public function checkRole($role){
        $roles = $this->tokenStorage->getToken()->getRoles();
        foreach($roles as $childRole){
           if($childRole->getRole() == $role){return true;}
        }

        return false;
    }

    public function onOkentoAdminmenu(AdminMenuEvent $event){
    }
}