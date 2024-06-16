<?php


use PHPUnit\Framework\TestCase;
use App\RandomStringGenerator;

class RandomStringGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new RandomStringGenerator();
        $randomString = $generator->generate(16);

        $this->assertEquals(16, strlen($randomString));
        $this->assertMatchesRegularExpression('/^[a-z0-9]+$/', $randomString);
    }
}
