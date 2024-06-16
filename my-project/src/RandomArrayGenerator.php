<?php

namespace App;

class RandomArrayGenerator
{
    private $stringGenerator;

    public function __construct(RandomStringGenerator $stringGenerator)
    {
        $this->stringGenerator = $stringGenerator;
    }

    public function generate(int $length = 3, int $stringLength = 16): array
    {
        $array = [];
        
        for ($i = 0; $i < $length; $i++) {
            $array[] = $this->stringGenerator->generate($stringLength);
        }
        
        return $array;
    }
}