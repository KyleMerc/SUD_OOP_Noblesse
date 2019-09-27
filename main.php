<?php
<<<<<<< HEAD
// // A simple example of a closure

// function getGreetingFunction() {

//     $timeOfDay = "evening";
  
//     return ( function( $name ) use ( &$timeOfDay ) {
//       $timeOfDay = ucfirst( $timeOfDay ); 
//       return ( "Good $timeOfDay, $name!" );
//     } );
//   };
  
//   $greetingFunction = getGreetingFunction();
//   echo $greetingFunction( "Fred" ); // Displays "Good Morning, Fred!"
var_dump(0 == true);
=======

class Sample
{
    public $name;
}

$obj = new Sample;
$prop = 'name';

$obj->$prop = 'Hello';

echo $obj->$prop . "\n";
>>>>>>> oop/OOPMap
