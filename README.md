# GettersAndSetters
You don't need create all getters and setters in your class, only create attributes and comment it for display in your IDE.

## Version

@2.0.0 - Removed abstract methods and change reflection to closure.

@1.2.1 - Change name of methos from __get to get to override.

@1.2.0 - Remove support to codes with underscore and improve to use private attributes.

@1.1.0 - Adaptated to old codes which were used with underscore before name of attribute.

## Getting Started

composer install
    
    composer require k-hei/lombok-like

### Test Tutorial

Include LombokLike class where you need:

    include 'vendor/autoload.php';

Extend it on all classes that you need:

    class Test extends \LombokLike\BaseEntity {}

If you want methods can be displayed in your IDE, use the PHPdoc on attributes:

    class Test extends \LombokLike\BaseEntity {
        ...
        /**
         * @method typeOfReturn getNameOfAttribute() optionally description
         * @method typeOfReturn setNameOfAttribute($value) optionally description
         */
        protected $nameOfAttribute;
        ...
    }

And use!

    $test = new Test();
    $test->setNameOfAttribute("Test");
    echo $test->getNameOfAttribute();
    //Result display is: Test
    
If you call a unknown method, receive a fatal error:
    
    $test->setUnknowAttr("Unkmow property");
      
    Fatal error:
    Call to undefined function: setUnknowAttr()
    In: F:\htdocs\projects\LombokLike\index.php
    On line: 24

## Author

The LombokLike is created and maintained by [Khwesten Heiner](https://www.facebook.com/khwesten). Heiner is a senior FullStack web developer at [MeuTutor](http://www.meututor.com.br/) and [TeckS](http://tecks.com.br/).

## License

The LombokLike is released under the MIT public license.
