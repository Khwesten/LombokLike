<?php

namespace LombokLike;

abstract class BaseEntity
{
    const STRING_METHOD_GET = "get";
    const STRING_METHOD_SET = "set";
    const STRING_EMPTY = "";

    private $propertiesName = [];

    public function __call($methodName, $arguments)
    {
        $indexOfGetAttributeName = strpos($methodName, self::STRING_METHOD_GET);
        $indexOfSetAttributeName = strpos($methodName, self::STRING_METHOD_SET);

        $attributeName = "";

        if ($indexOfGetAttributeName === 0 || $indexOfSetAttributeName === 0) {
            $attributeName = lcfirst(
                str_replace([self::STRING_METHOD_GET, self::STRING_METHOD_SET], self::STRING_EMPTY, $methodName)
            );
        }

        $isGetMethod = ($indexOfGetAttributeName === 0);
        $isSetMethod = ($indexOfSetAttributeName === 0);

        $reflectClass = new \ReflectionClass($this);

        $properties = $reflectClass->getProperties();

        foreach ($properties as $property) {
            $this->propertiesName[$property->name] = '';
        }

        if (array_key_exists($attributeName, $this->propertiesName)) {
            if ($isGetMethod) {
                return $this->$attributeName;
            } else if ($isSetMethod) {
                $value = $arguments[0];
                $this->$attributeName = $value;
            }
        } else {
            $this->showError();
        }
    }

    public abstract function get($name);

    public abstract function set($name, $value);

    private function showError()
    {
        $trace = debug_backtrace();

        echo(
            "<div style=\"clear: both\"></div>" .
            "<strong style=\"color: red;\">Fatal error:</strong><br>" .
            "Call to undefined function: <i>{$trace[2]['function']}()</i><br>" .
            "In: <i>{$trace[1]['file']}</i><br>" .
            "On line: <i>{$trace[1]['line']}</i>" .
            "<br>"
        );
    }

}