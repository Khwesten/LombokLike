# GettersAndSetters
You dont need create all getters and setters in your class, only create attributes and comment him for display in your IDE.

## Getting Started

### Test Tutorial

Include GettersAndSetters class where you need:

    include 'GettersAndSetters.php';

Extend him on all classes that you need:

    class Test extends GettersAndSetters {}

Use protected attributes to him can be manipulated:

    class Test extends GettersAndSetters {
        ...
        protected $name;
        ...
    }
    
If you want methods can be display in your IDE, use the PHPdoc on attributes:

    class Test extends GettersAndSetters {
        ...
        /**
         * @method typeOfReturn getNameOfAttribute() optionally description
         * @method typeOfReturn setNameOfAttribute($value) optionally description
         */
        protected $nameOfAttribute;
        ...
    }

## Author

The GettersAndSetters is created and maintained by [Khwesten Heiner](https://www.facebook.com/khwesten). Heiner is a senior FullStack web developer at [MeuTutor](http://www.meututor.com.br/) and [Locadados](https://www.facebook.com/locadados).

## License

The GettersAndSetters is released under the MIT public license.
