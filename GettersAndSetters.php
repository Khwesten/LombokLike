<?php

class GettersAndSetters {

    public function __call($methodName, $arguments) {
        $isGet = strstr($methodName, "get");
        $isSet = strstr($methodName, "set");

        $nameAttrWithoutGet = str_replace("get", "", $methodName);
        $nameAttrWithoutSet = str_replace("set", "", $nameAttrWithoutGet);

        $nameAttr = lcfirst($nameAttrWithoutSet);

        if (property_exists($this, $nameAttr)) {
            if ($isSet) {
                $this->$nameAttr = $arguments[0];
                return $this;
            } else if ($isGet) {
                return $this->$nameAttr;
            }
        } else {
            $this->showError();
        }
    }

    private function showError() {
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

}
