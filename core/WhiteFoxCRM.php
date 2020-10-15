<?php

class WhiteFoxCRM {

	public $db;

	public $config;

	public $request;

	public $action;

	public function __construct()
	{
		$this->_populateConfig();

		$this->_handleRequest();
	}

	public function canProceed()
	{
		return empty($this->action);
	}

	private function _populateConfig()
	{
		$dirPath = __DIR__ . "/../config";
		$dirHandler = opendir($dirPath);

		$this->config = new stdClass();

		while(false !== ($entry = readdir($dirHandler))) {
			$filePath = $dirPath . "/$entry";
			if (is_file($filePath)) {
				$value = include $filePath;
				$fileName = str_replace(".php", "", $entry);
				$this->config->{$fileName} = (object)$value;
			}
		}

		closedir($dirHandler);
	}

	private function _handleRequest()
	{
		$this->request = new Request();

		$this->action = $this->config->routes->getRoute($this->request);

		if ($this->action instanceof Closure) {
			$this->action->call($this, $this->request);
		} else {
			echo $this->action;
		}
	}
}