<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 1/16/19
 * Time: 2:25 PM
 */

namespace Fracalo\Arr2Xml\Test\MockInput;

use Fracalo\Arr2Xml\Test\Input;

class WithNsAttrs extends Input
{
    protected static $version = '1.0';

    protected static $encoding = 'UTF-8';

    protected static $data = [
        '_nodeName' => 'root',
        '_attrsNS' => [
            [
                '_ns' => 'http://www.w3.org/2000/xmlns/',
                '_name' => 'xmlns:xsd',
                '_value' => 'http://www.w3.org/2001/XMLSchema'
            ],
        ],
        '_val' => [
            [
                '_nodeName' => 'Good_guy',
                '_val' => [
                    [
                        '_nodeName' => 'name',
                        '_val' => 'Luke Skywalker'
                    ],
                    [
                    '_nodeName' => 'weapon',
                    '_val' => 'Lightsaber'
                    ]
                ],
            ],
            [
                '_nodeName' => 'Bad_guy',
                '_val' => [
                    [
                        '_nodeName' => 'name',
                        '_val' => 'Sauron'
                    ],
                    [
                        '_nodeName' => 'weapon',
                        '_val' => 'Evil Eye'
                    ]
                ],
            ],
        ]
    ];
}