<?php

include_once 'vendor/autoload.php';

class Test extends \LombokLike\Entity\Base {

    /**
     * @method String getName()
     * @method void setName($value)
     */
    private $name;

    /**
     * @method String getYears()
     * @method void setYears($value)
     */
    protected $years;
}

$test = new Test();

$test->setName("Name test");
$test->setYears(25);
$test->setUnknowAttr("Unkmow property");

echo $test->getName();
echo "<br>";
echo $test->getYears();
echo "<br>";
echo $test->getUnknowAttr();