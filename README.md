# GettersAndSetters
You don't need create all getters and setters in your class, only create attributes and comment it for display in your IDE.

## Version

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

Implement magic methods of php:

    class Test extends \LombokLike\BaseEntity {
        ...
        private $name;
        ...
        public function set($name, $value) { $this->$name = $value; }
        public function get($name) { return $this->$name; }
    }

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

and use:

    $test = new Test();
    $test->setNameOfAttribute("Test");
    echo $test->getNameOfAttribute();
    //Result display is: Test

## Author

The GettersAndSetters is created and maintained by [Khwesten Heiner](https://www.facebook.com/khwesten). Heiner is a senior FullStack web developer at [MeuTutor](http://www.meututor.com.br/) and [TeckS](http://tecks.com.br/).

## License

The GettersAndSetters is released under the MIT public license.
