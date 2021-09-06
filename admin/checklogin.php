<?php
require_once("../db/config.php");
session_start();

if (isset($_POST["btnLogin"])) {
    if (empty($_POST['name']) || empty($_POST['pass'])) {
        header("location:login.php?Empty= Please Fill in the Blanks");
    } else {
        $query = "Select name, password from admin where name='" . $_POST['name'] . "' AND password='" . $_POST['pass'] . "'";
        $result = mysqli_query($con, $query);
        if (mysqli_fetch_assoc($result)) {
            $_SESSION['name'] = $_POST['name'];
            header("location:index.php");
        } else {
            header("location:login.php?Invalid= Please Enter Correct Username and Password ");
        }
    }
}
