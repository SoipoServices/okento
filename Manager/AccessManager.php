<?php
/**
 * Created by PhpStorm.
 * User: soiposervices
 * Date: 29/11/15
 * Time: 11:21
 */

namespace Soipo\Okento\AdminBundle\Manager;


use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AccessManager
{
    protected  $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker){
        $this->authorizationChecker = $authorizationChecker;
    }

    /**
     * Check if the logged in user has roles passed in the array
     * @param array $roles
     */
    public function checkAccess(array $roles){

        foreach($roles as $role){
            if (!$this->authorizationChecker->isGranted($role)) {
                throw new AccessDeniedException('error.access.denied');
            }
        }
    }

}