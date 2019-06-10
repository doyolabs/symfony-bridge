<?php


namespace Doyo\Symfony\Bridge\EventDispatcher;

if(interface_exists('Symfony\Contracts\EventDispatcher\EventDispatcherInterface')){
    interface BaseEventDispatcherInterface extends \Symfony\Contracts\EventDispatcher\EventDispatcherInterface
    {
    }
}else{
    interface BaseEventDispatcherInterface extends \Symfony\Component\EventDispatcher\EventDispatcherInterface
    {
    }
}

interface EventDispatcherInterface extends BaseEventDispatcherInterface
{
}