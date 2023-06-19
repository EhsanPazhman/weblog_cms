<?php
// function for assets addresses
function assets($uri = ''):string
{
    return BASE_URL . "assets/$uri";
}
// function for admin assets addresses
function adminAssets($uri = ''):string
{
    return BASE_URL . "admin/assets/$uri";
}
// function for site url addresses
function siteUrl($uri =''): string
{
    return BASE_URL . $uri;
}

// function for set error message and redirect
function setErrorAndRedirect(string $msg, string $target): void
{
    $_SESSION['error'] = $msg;
    header('location:' . siteUrl($target));
    die();
}

// function for success message and redirect
function successMessage(string $msg, string $target): void
{
    $_SESSION['success'] = $msg;
    header('Location: ' . BASE_URL . $target);
}
