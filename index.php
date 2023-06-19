<?php
include "bootstrap/init.php";
// User exit condition
if (isset($_GET['exit']))
{
    userExit();
}

$user = getLoggedInUser();
include "views/index.php";