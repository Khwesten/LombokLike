<?php

include_once 'vendor/autoload.php';

class Test extends \LombokLike\BaseEntity {

    /**
     * @method String getName()
     * @method void setName($value)
     */
    private $name;

    /**
     * @method String getNameWithUnderscore()
     * @method void setNameWithUnderscore($value)
     */
    protected $test;

    public function __set($name, $value) { $this->$name = $value; }
    public function __get($name) { return $this->$name; }
}

$test = new Test();
$test->setName("Name test");
$test->setTest("Test name");

echo $test->getName();
echo "<br>";
echo $test->getTest();
