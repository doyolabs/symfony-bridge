<?php

namespace Test\Doyo\Symfony\Bridge;


use Doyo\Symfony\Bridge\EventDispatcher\Event;
use Doyo\Symfony\Bridge\EventDispatcher\EventDispatcherInterface;
use Doyo\Symfony\Bridge\Translation\TranslatorInterface;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
    /**
     * @param   string $contractClass
     * @param   string $componentClass
     * @dataProvider getTestBridge
     * @throws \ReflectionException
     */
    public function testBridge($classOrInterface, $contractClass, $componentClass)
    {
        $r = new \ReflectionClass($classOrInterface);
        if(false !== strpos($classOrInterface, 'Interface')){
            if(interface_exists($contractClass)){
                $this->assertTrue(
                    $r->implementsInterface($contractClass)
                );
            }else{
                $this->assertTrue(
                    $r->implementsInterface($componentClass)
                );
            }
        }else{
            $ob = $this->createMock($classOrInterface);
            $implementation = class_exists($contractClass) ? $contractClass:$componentClass;
            $this->assertInstanceOf($implementation, $ob);
        }
    }

    public function getTestBridge()
    {
        return [
            [
                EventDispatcherInterface::class,
                'Symfony\Contracts\EventDispatcher\EventDispatcherInterface',
                'Symfony\Component\EventDispatcher\EventDispatcherInterface'
            ],
            [
                Event::class,
                'Symfony\Contracts\EventDispatcher\Event',
                'Symfony\Component\EventDispatcher\Event'
            ],
            [
                TranslatorInterface::class,
                'Symfony\Contracts\Translation\TranslatorInterface',
                'Symfony\Component\EventDispatcher\EventDispatcherInterface'
            ],
        ];
    }


}
