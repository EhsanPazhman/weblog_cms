<?php
include "bootstrap/init.php";
$user = getLoggedInUser();

if (isset($_GET['exit']))
{
    userExit();
}
include "views/index.php";