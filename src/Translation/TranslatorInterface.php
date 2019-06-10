<?php


namespace Doyo\Symfony\Bridge\Translation;

if(interface_exists('Symfony\Contracts\Translation\TranslatorInterface')){
    interface BaseTranslatorInterface extends \Symfony\Contracts\Translation\TranslatorInterface
    {

    }
}else{
    interface BaseTranslatorInterface extends \Symfony\Component\Translation\TranslatorInterface
    {

    }
}

interface TranslatorInterface extends BaseTranslatorInterface
{

}