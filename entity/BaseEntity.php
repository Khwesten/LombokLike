<?php

namespace LombokLike\Entity;

use LombokLike\Exception\LombokLikeException;

/**
 * Created by IntelliJ IDEA.
 * User: k-heiner@hotmail.com
 * Date: 22/10/2015
 * Time: 12:22
 */
abstract class BaseEntity
{
    const STRING_METHOD_GET = "get";
    const STRING_METHOD_SET = "set";
    const STRING_EMPTY = "";

    private static $indexOfGetAttributeName;
    private static $indexOfSetAttributeName;

    public function __call($methodName, $arguments)
    {
        self::$indexOfGetAttributeName = strpos($methodName, self::STRING_METHOD_GET);
        self::$indexOfSetAttributeName = strpos($methodName, self::STRING_METHOD_SET);

        $attributeName = self::getAttributeName($methodName);

        $get = function ($object, $attribute) {
            return $object->$attribute;
        };

        $set = function ($object, $attribute, $value) {
            return $object->$attribute = $value;
        };

        $closureGet = \Closure::bind($get, null, $this);
        $closureSet = \Closure::bind($set, null, $this);

        if (property_exists($this, $attributeName)) {
            if (self::isGetMethod()) {
                return $closureGet($this, $attributeName);
            } else if (self::isSetMethod()) {
                $value = $arguments[0];
                $closureSet($this, $attributeName, $value);
            }
        } else {
            self::generateLombokException();
        }

    }

    private static function getAttributeName($methodNAme)
    {
        if (self::$indexOfGetAttributeName === 0) {
            $attributeName = self::removeGetFromInit($methodNAme);
        } elseif (self::$indexOfSetAttributeName === 0) {
            $attributeName = self::removeSetFromInit($methodNAme);
        } else {
            $attributeName = self::STRING_EMPTY;
        }

        return $attributeName;
    }

    private static function isGetMethod()
    {
        return (self::$indexOfGetAttributeName === 0);
    }

    private static function isSetMethod()
    {
        return (self::$indexOfSetAttributeName === 0);
    }

    private static function removeGetFromInit($var)
    {
        return self::removeTextFromInit(self::STRING_METHOD_GET, $var);
    }

    private static function removeSetFromInit($var)
    {
        return self::removeTextFromInit(self::STRING_METHOD_SET, $var);
    }

    private static function removeTextFromInit($textToRemove, $var)
    {
        return lcfirst(str_replace($textToRemove, self::STRING_EMPTY, $var));
    }

    private static function generateLombokException()
    {
        $trace = debug_backtrace();

        $lastIndexOfArray = sizeof($trace) - 1;

        $lastErrorFile = $trace[$lastIndexOfArray]['file'];
        $lastErrorLine = $trace[$lastIndexOfArray]['line'];
        $lastErrorFunction = $trace[$lastIndexOfArray]['function'];

        self::throwException(E_ERROR, $lastErrorFunction, $lastErrorFile, $lastErrorLine);
    }

    private static function throwException($code, $function, $file, $line)
    {
        throw new LombokLikeException("Call to undefined function: {$function}() In: {$file} On line: {$line}");
    }

}