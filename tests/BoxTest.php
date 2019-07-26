<?php

use Eselt\Box;

class BoxTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_can_be_instantiated()
    {
        $box = new Box(10, 5, 20);
        $this->assertNotNull($box);
    }
    
    // @TODO
}