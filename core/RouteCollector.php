<?php


class RouteCollector
{
	private $routes;

	public function get($path, $function)
	{
		$this->routes->GET[$path] = $function;
		return $this;
	}

	public function post($path, $function)
	{
		$this->routes->POST[$path] = $function;
		return $this;
	}

	public function put($path, $function)
	{
		$this->routes->PUT[$path] = $function;
		return $this;
	}

	public function patch($path, $function)
	{
		$this->routes->PATCH[$path] = $function;
		return $this;
	}

	public function delete($path, $function)
	{
		$this->routes->DELETE[$path] = $function;
		return $this;
	}

	public function getRoute(Request $request)
	{
		// Force this route to be the vue index route
		if ($request->getURI() == "/")
			return null;

		if (empty($function = $this->routes->{$request->getMethod()}[$request->getURI()])) {
			throw new \Exceptions\InvalidRouteException();
		}

		return $function;
	}
}