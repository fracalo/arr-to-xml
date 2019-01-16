<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 1/16/19
 * Time: 2:28 PM
 */

namespace Fracalo\Arr2Xml\Test;


class Input
{
    protected static $version;
    protected static $encoding;
    protected static $data;

    public static function version()
    {
        return static::$version;
    }

    public static function encoding()
    {
        return static::$encoding;
    }

    public static function data() : array
    {
        return static::$data;
    }
}