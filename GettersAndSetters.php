<?php

class GettersAndSetters {

    public function __call($methodName, $arguments) {
        $nameAttrWithoutGet = str_replace("get", "", $methodName);
        $nameAttrWithoutSet = str_replace("set", "", $nameAttrWithoutGet);

        $nameAttr = lcfirst($nameAttrWithoutSet);

        if (property_exists($this, $nameAttr)) {
            if (empty($arguments)) {
                return $this->$nameAttr;
            } else {
                $this->$nameAttr = $arguments[0];
                return $this;
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
            "Call to undefined function: <i>{$trace[1]['function']}()</i><br>" .
            "In: <i>{$trace[1]['file']}</i><br>" .
            "On line: <i>{$trace[1]['line']}</i>" .
            "<br>"
        );

        return null;
    }

}