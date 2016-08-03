<?php

session_start();

if ( isset($_SESSION["gp_access_token"]) or isset($_SESSION["gp_result"]) ){
    unset($_SESSION["gp_access_token"]);
    unset($_SESSION["gp_result"]);
    header("location: index");
}

else{
    header("location: index");
}

?>