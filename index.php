<?php
session_start();

//ToDo File-Upload Aufgabe in OOP umsetzen
//ToDo handler.php und Class hinzufügen
//ToDo CSV-Export, Excel Export

//require_once "classes/Autoloader.php";
//(new Autoloader("upload", "." ));

require_once __DIR__ . "/vendor/autoload.php";


use \upload\classes\output\Form;
use \upload\classes\output\HtmlStructure;



HtmlStructure::headAndBodyStart("File-Upload");

if ( isset( $_SESSION["msg"] )) {
    echo $_SESSION["msg"];
    unset( $_SESSION["msg"]);
}

Form::printForm("local" );

Form::printForm( "url" );

FORM::printForm( "ftp" );

HtmlStructure::closeBody();