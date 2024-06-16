<?php

require __DIR__ . '/../vendor/autoload.php';

use App\RandomStringGenerator;
use App\RandomArrayGenerator;
use App\Rot13Encoder;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;

$container = new ContainerBuilder();

$fileLocator = new FileLocator(__DIR__ . '/../config');

$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../config'));

$loader->load('services.yaml');

$stringGenerator = $container->get(RandomStringGenerator::class);
$arrayGenerator = $container->get(RandomArrayGenerator::class);
$encoder = $container->get(Rot13Encoder::class);

$randomString = $stringGenerator->generate();
$randomArray = $arrayGenerator->generate();
$encodedString = $encoder->encode($randomString);
$encodedArray = $encoder->encodeArray($randomArray);

$decodedString = $encoder->decode($encodedString);
$decodedArray = $encoder->decodeArray($encodedArray);

echo nl2br("Random string: $randomString\n");
echo nl2br("Encoded string: $encodedString\n");
echo nl2br("Decoded string: $decodedString\n");
echo nl2br("Random array: " . implode(', ', $randomArray) . "\n");
echo nl2br("Encoded array: " . implode(', ', $encodedArray) . "\n");
echo nl2br("Decoded array: " . implode(', ', $decodedArray) . "\n");
