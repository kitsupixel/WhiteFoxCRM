<?php

return [

	"default" => "mysql",

	"connections" => [
		'mysql' => [
            'driver' => 'mysql',
            'url' => "localhost",
            'host' => "localhost",
            'port' => '3306',
            'database' => "whitefoxcrm",
            'username' => "root",
            'password' => "",
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'strict' => true,
            'engine' => null,
        ],
	]
];