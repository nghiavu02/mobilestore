<?php

function baseUrl($uri)
{
    if (getArea() === 1) {
        return ADMIN_BASE_URL . $uri;
    }
    return BASE_URL . $uri;
}

function getParameter()
{
    $router_path = BASE_PATH . "/core/Router.php";
    if (file_exists($router_path)) {
        if (class_exists('Router')) {
            $router = new Router();
            return $router->getParam();
        }
    }
    return $null;
}

function getArea()
{
    $router_path = BASE_PATH . "/core/Router.php";
    if (file_exists($router_path)) {
        if (class_exists('Router')) {
            $router = new Router();
            return $router->getArea();
        }
    }
    return 0;
}

function getModule()
{
    $router_path = BASE_PATH . "/core/Router.php";
    if (file_exists($router_path)) {
        if (class_exists('Router')) {
            $router = new Router();
            return $router->getModule();
        }
    }
    return $null;
}

function getAction()
{
    $router_path = BASE_PATH . "/core/Router.php";
    if (file_exists($router_path)) {
        if (class_exists('Router')) {
            $router = new Router();
            return $router->getAction();
        }
    }
    return $null;
}

function getPostParameter($key, $default = null)
{
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }

    return $default;
}

function redirect($uri)
{
    $location = baseUrl($uri);
    header("location: $location");
    exit;
}

function pretty($array_data)
{
    print("<pre>" . print_r($array_data, true) . "</pre>");
}
