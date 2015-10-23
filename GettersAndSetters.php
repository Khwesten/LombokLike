<?php

class GettersAndSetters
{
    protected $nameAttrWithUnderscore;

    public function __call($methodName, $arguments)
    {
        $isGet = strstr($methodName, "get");
        $isSet = strstr($methodName, "set");

        $nameAttrWithoutGet = str_replace("get", "", $methodName);
        $nameAttrWithoutSet = str_replace("set", "", $nameAttrWithoutGet);

        $attributeName = lcfirst($nameAttrWithoutSet);

        if ($this->hasAttribute($attributeName)) {
            $attribute = $this->getAttributeName($attributeName);
            if ($isSet) {
                $this->$attributeName = $arguments[0];
                return $this;
            } elseif ($isGet) {
                return $this->$attributeName;
            }
        } else {
            $this->showError();
        }
    }

    private function showError()
    {
        $trace = debug_backtrace();

        echo (
            "<div style=\"clear: both\"></div>" .
            "<strong style=\"color: red;\">Fatal error:</strong><br>" .
            "Call to undefined function: <i>{$trace[0]['function']}()</i><br>" .
            "In: <i>{$trace[0]['file']}</i><br>" .
            "On line: <i>{$trace[0]['line']}</i>" .
            "<br>"
        );

        return null;
    }

    private function hasAttribute($nameAttr)
    {
        $result = false;

        $this->nameAttrWithUnderscore = "_" . $nameAttr;

        if (
            property_exists($this, $nameAttr)
            || property_exists($this, $this->nameAttrWithUnderscore)
        ) {
            $result = true;
        }

        return $result;
    }

    private function getAttributeName($nameAttr)
    {
        $attribute = (property_exists($this, $this->nameAttrWithUnderscore))
            ? $attribute = $this->nameAttrWithUnderscore : $nameAttr;

        return $attribute;
    }

}
