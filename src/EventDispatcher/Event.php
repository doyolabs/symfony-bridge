<?php


namespace Doyo\Symfony\Bridge\EventDispatcher;

if(class_exists('Symfony\Contracts\EventDispatcher\Event')){
    class BaseEvent extends \Symfony\Contracts\EventDispatcher\Event
    {
    }
}else{
    class BaseEvent extends \Symfony\Component\EventDispatcher\Event
    {
    }
}

class Event extends BaseEvent
{

}

