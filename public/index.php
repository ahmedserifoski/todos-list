<?php 
session_start();

require "../init.php";

$pathInfo = $_SERVER["PATH_INFO"];

$routes = [
    "/index" => [
      "controller" => "todosController",
      "method" => "index"
    ]
  ];
  
  if(isset($routes[$pathInfo])) {
    $route = $routes[$pathInfo];
  
    $controllerName = $route["controller"];
    $methodName = $route["method"];
  
    $controller = $container->make($controllerName);
    $controller->$methodName();
  }

?>