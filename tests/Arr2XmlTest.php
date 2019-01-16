<?php

namespace Fracalo\Arr2Xml\Test;

use PHPUnit\Framework\TestCase;
use Fracalo\Arr2Xml\Arr2Xml;

class Arr2XmlTest extends TestCase
{
    /** @test array */
    protected $testArray = [];

    public function setUp() : void
    {
        $this->testArray = [
            'Good guy' => [
                'name' => 'Luke Skywalker',
                'weapon' => 'Lightsaber',
            ],
            'Bad guy' => [
                'name' => 'Sauron',
                'weapon' => 'Evil Eye',
            ],
        ];
    }

    public function testItCanConvertAnArrayToXml() : void
    {
        $payloadsDir = scandir(__DIR__ . '/MockInput');
        $payloadsList = array_filter($payloadsDir, function($x){
           return preg_match('/^[^_].*php$/', $x);
        });
        $classesList = array_map(function($x){
           return explode('.', $x)[0];
        }, $payloadsList);


        foreach($classesList as $c) {
            $class = '\\Fracalo\\Arr2Xml\\Test\\MockInput\\' . $c;

            $data = $class::data();
            $version = $class::version();
            $encoding  = $class::encoding();

            $x = new Arr2Xml($version, $encoding);
            $xml = $x->convert($data);

            $filename = __DIR__ . '/mockXml/' . lcfirst($c) . '.xml';
            $mockXml = file_get_contents($filename);
            $this->assertEquals($xml, $mockXml, "on $filename test");
        }
    }

}