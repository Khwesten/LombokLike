<?php

include './GettersAndSetters.php';

class Test extends GettersAndSetters {

    /**
     * @method String getName() return the value of attribute name
     * @method $this setName($value) set the value in attribute name
     */
    protected $name;
}

$test = new Test();
$test->setName("Name");
echo $test->getName();
