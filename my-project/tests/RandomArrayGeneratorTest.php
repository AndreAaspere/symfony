<?php

use PHPUnit\Framework\TestCase;
use App\RandomStringGenerator;
use App\RandomArrayGenerator;

class RandomArrayGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $stringGenerator = new RandomStringGenerator();
        $arrayGenerator = new RandomArrayGenerator($stringGenerator);
        $randomArray = $arrayGenerator->generate(3, 16);

        $this->assertCount(3, $randomArray);
        foreach ($randomArray as $randomString) {
            $this->assertEquals(16, strlen($randomString));
            $this->assertMatchesRegularExpression('/^[a-z0-9]+$/', $randomString);
        }
    }
}
