<?php
include "bootstrap/init.php";
// User exit condition
if (isset($_GET['exit']))
{
    userExit();
}
include "views/index.php";