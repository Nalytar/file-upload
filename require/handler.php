<?php
session_start();

require_once "const.php";
require_once __DIR__ . "/../vendor/autoload.php";


//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

if ( isset( $_POST["action"]) ) {

    $availableHandler = array( "local", "url" , "ftp" );

    $choosenHandler = htmlspecialchars( strip_tags( $_POST["hidden"] ));

    if ( in_array( $choosenHandler, $availableHandler, true )){

        $handler = new \upload\classes\handler\Handler( $choosenHandler );
        if ( $handler->getFile() ) {

            $_SESSION["msg"] = MSG_START_SUCCESS . MSG_TYPE["succes"] . MSG_END;
        }
    } else {

        $_SESSION["msg"] = MSG_START_FAIL . MSG_TYPE["no_action"] . MSG_END;
    }

}

header("Location: /index.php");