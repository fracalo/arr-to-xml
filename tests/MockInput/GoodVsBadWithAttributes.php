<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 1/16/19
 * Time: 2:25 PM
 */

namespace Fracalo\Arr2Xml\Test\MockInput;

use Fracalo\Arr2Xml\Test\Input;

class GoodVsBadWithAttributes extends Input
{
    protected static $version = '1.0';

    protected static $encoding = 'UTF-8';

    protected static $data = [
        '_nodeName' => 'root',
        '_val' => [
            [
                '_nodeName' => 'Good_guy',
                '_attrs' => [
                   'version' => 'sayan'
                ],
                '_val' => [
                    [
                        '_nodeName' => 'name',
                        '_val' => 'Goku'
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