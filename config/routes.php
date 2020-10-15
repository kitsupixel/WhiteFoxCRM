<?php

$routes = new RouteCollector();

$routes->get("/api/hello", function () {
	echo "Hello, world!";
});


return $routes;