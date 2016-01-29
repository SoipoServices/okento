<?php

namespace Soipo\Okento\AdminBundle\Twig;


class AdminTwigExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('flashes', array($this, 'getAllFlashMessages'),array('is_safe' => array('html'),'needs_environment' => true)),
        );
    }

    public function getAllFlashMessages(\Twig_Environment $twig)
    {
        return $twig->render('SoipoOkentoAdminBundle:Twig:flash_messages.html.twig');
    }

    public function getName()
    {
        return 'okent_admin_flash';
    }
}