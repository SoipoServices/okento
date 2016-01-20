<?php
/**
 * Created by PhpStorm.
 * User: soiposervices
 * Date: 16/01/16
 * Time: 11:55
 */

namespace Soipo\Okento\AdminBundle\Model\Resources;


class BaseChoiceOption implements ChoiceOptionInterface
{
    static function getList(){
        return array();
    }

    static function getLabel($value){

        //Late Static Bindings
        $options = static::getList();
        if(is_array($options)){
            foreach($options as $key => $optionLabel){
                if($key == $value){
                    return $optionLabel;
                }
            }
        }
    }

    static function getValue($label){
        //Late Static Bindings
        $options = static::getList();
        if(is_array($options)){
            foreach($options as $key => $optionLabel){
                if($optionLabel == $label){
                    return $key;
                }
            }
        }
    }

}