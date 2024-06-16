<?php
use PHPUnit\Framework\TestCase;
use App\Rot13Encoder;
use App\RandomStringGenerator;
use App\RandomArrayGenerator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class Rot13EncoderTest extends KernelTestCase
{
    public function testEncode()
    {
        $generator = new RandomStringGenerator();
        $randomString = $generator->generate(16);

        $encoder = new Rot13Encoder();
        $encodedString = $encoder->encode($randomString);

        $decodedString = $encoder->decode($encodedString);
        
        $this->assertEquals($randomString, $decodedString);
    }

    public function testEncodeArray()
    {
        $stringGnerator = new RandomStringGenerator();
        $generator = new RandomArrayGenerator($stringGnerator);
        $randomArray = $generator->generate();

        $encoder = new Rot13Encoder();
        $encodedArray = $encoder->encodeArray($randomArray);
        $decodedArray = $encoder->decodeArray($encodedArray);
        
        $this->assertEquals($randomArray, $decodedArray);
    }
}