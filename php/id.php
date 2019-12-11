<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "tournament");
if(isset($_SESSION["id"])){
    
}