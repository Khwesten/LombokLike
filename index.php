<?php

include './GettersAndSetters.php';

class Test extends GettersAndSetters {

    /**
     * @method String getName() return the value of attribute name
     * @method $this setName($value) set the value in attribute name
     */
    protected $name;

    /**
     * @method String getNameWithUnderscore() return the value of attribute name
     * @method $this setNameWithUnderscore($value) set the value in attribute name
     */
    protected $_nameWithUnderscore;
}

$test = new Test();
$test->setName("Name");
$test->setNameWithUnderscore("Name");
echo $test->getName();
echo "<br>";
echo $test->getNameWithUnderscore();
