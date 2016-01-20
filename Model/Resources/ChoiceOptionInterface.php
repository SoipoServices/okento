<?php
/**
 * Created by PhpStorm.
 * User: soiposervices
 * Date: 16/01/16
 * Time: 11:56
 */

namespace Soipo\Okento\AdminBundle\Model\Resources;


interface ChoiceOptionInterface
{
    static function getList();
    static function getLabel($value);
    static function getValue($label);
}