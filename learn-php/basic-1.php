<?php
// PHP Basic #1 by  @DenverDev

// Part 1: Variables

// declaration de variable type string (chaine de caractere)
$varString = "Hello World";
// affichage de la variable
echo $varString;

// declaration de variable type int (nombre entier)
$varInt = 42;
// affichage de la variable
echo $varInt;

// declaration de variable type float (nombre a virgule)
$varFloat = 1.5;
// affichage de la variable
echo $varFloat;

// declaration de variable type bool (vrai ou faux)
$varBool = true;
// affichage de la variable
echo $varBool;

// declaration de variable type array (tableau)
$varArray = array("Hello", "World");
// affichage de la variable
echo $varArray[0] . " " . $varArray[1];

// declaration de variable type object (objet)
$varObject = new stdClass();
$varObject->name = "Hello World";
// affichage de la variable
echo $varObject->name;

// declaration de variable type null (null)
$varNull = null;
// affichage de la variable
echo $varNull;

// declaration de variable type resource (ressource)
$varResource = fopen("test.php", "r");
// affichage de la variable
echo $varResource;


// Part 2: Conditions (if, else, elseif)

// if statement
if (true) {
    echo "true";
}
// else statement
else {
    echo "false";
}

// elseif statement
if (false) {
    echo "false";
}elseif (true) {
    echo "true";
}else {
    echo "false";
}

// Part 3: Loops (for, while, do while)

// for loop
for ($i = 0; $i < 10; $i++) {
    echo $i;
}

// while loop
$i = 0;
while ($i < 10) {
    echo $i;
    $i++;
}

// do while loop
$i = 0;
do {
    echo $i;
    $i++;
}while ($i < 10);

// Part 4: Functions

//declaration de fonction
function myFunction() {
    echo "Hello World";
    
}

//appel de fonction
myFunction();

// function with parameters
function myFunctionWithParameters($param1, $param2) {
    echo $param1 . " " . $param2;
}

// call function with parameters
myFunctionWithParameters("Hello", "World");

// Part 5: Arrays (indexed, associative, multi-dimensional)

// declaration de tableau indexe
$varArray = array("Hello", "World");
// affichage de la variable
echo $varArray[0] . " " . $varArray[1];

// declaration de tableau associe
$varArray = array("Hello" => "World");
// affichage de la variable
echo $varArray["Hello"];

// declaration de tableau multidimensionnel
$varArray = array(
    array("Hello", "World"),
    array("Hello", "World")
);
// affichage de la variable
echo $varArray[0][0] . " " . $varArray[0][1];

// End of PHP Basic #1 by  @DenverDev

?>
