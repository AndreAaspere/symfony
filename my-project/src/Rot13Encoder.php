<?php

namespace App;

class Rot13Encoder
{
    public function encode(string $input): string
    {
        return str_rot13($input);
    }

    public function decode(string $input): string
    {
        return str_rot13($input);
    }

    public function encodeArray(array $input): array
    {
        return array_map([$this, 'encode'], $input);
    }

    public function decodeArray(array $input): array
    {
        return array_map([$this, 'decode'], $input);
    }
}