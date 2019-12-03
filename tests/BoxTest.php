<?php

use Eselt\Box;

class BoxTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_can_be_instantiated(): Box
    {
        $box = new Box(10, 5, 20);
        $this->assertNotNull($box);

        return $box;
    }

    public function invalidSizesProvider()
    {
        return [
            [0, 0, 0],

            [1, 0, 0],
            [0, 1, 0],
            [0, 0, 1],

            [1, 1, -1],
            [1, -1, 1],
            [-1, 1, 1],
        ];
    }

    /**
     * Box dimensions cannot be 0 or less
     * 
     * @dataProvider invalidSizesProvider
     */
    public function test_invalid_box_sizes($x, $y, $z): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Box($x, $y, $z);
    }
    
    public function sizesDoesFitProvider(): array
    {
        return [
            [9.9, 4.9, 19.9],
            [9, 4, 19],
            [1, 1, 1]
        ];
    }

    /**
     * @depends test_it_can_be_instantiated
     * @dataProvider sizesDoesFitProvider
     */
    public function test_does_fit_the_box($x, $y, $z, Box $mainBox): void
    {
        $this->assertTrue((new Box($x, $y, $z))->fitsInto($mainBox));
    }
    
    public function sizesDoesNotFitProvider(): array
    {
        return [
            [10, 5, 20],
            [11, 5, 20],
            [10, 6, 20],
            [10, 5, 21]
        ];
    }

    /**
     * @depends test_it_can_be_instantiated
     * @dataProvider sizesDoesNotFitProvider
     */
    public function test_does_not_fit_the_box($x, $y, $z, Box $mainBox): void
    {
        $this->assertFalse((new Box($x, $y, $z))->fitsInto($mainBox));
    }
}
