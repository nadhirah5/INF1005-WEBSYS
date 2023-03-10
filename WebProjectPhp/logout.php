<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
//check if the firstname and lastname is stored in session
if (isset($_SESSION['fname']) || isset($_SESSION['lname'])) {
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    header("Location: index.php");
}

session_destroy();
?>