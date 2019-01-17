<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 1/16/19
 * Time: 2:25 PM
 */

namespace Fracalo\Arr2Xml\Test\MockInput;

use Fracalo\Arr2Xml\Test\Input;

class MultiItems extends Input
{
    protected static $version = '1.0';

    protected static $encoding = 'UTF-8';

    protected static $data = [
        '_nodeName' => 'root',
        '_val' => [
            [
                '_nodeName' => 'items',
                '_val' => [
                    [
                        '_nodeName' => 'item',
                        '_val' => 'Computer'
                    ],
                    [
                        '_nodeName' => 'item',
                        '_val' => 'Keyboard'
                    ],
                    [
                        '_nodeName' => 'item',
                        '_val' => 'Mouse'
                    ],
                    [
                        '_nodeName' => 'item',
                        '_val' => 'Monitor'
                    ],
                ]
            ]
        ]
    ];
}