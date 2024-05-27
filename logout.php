<?php
include "./include/bootstrap.php";

if(isset($_SESSION["user"])) {
    session_destroy();
    redirect("./index.php");
} else {
    redirect("./index.php");
}