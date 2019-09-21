<?php

namespace Larasoft\WPLogger\Logger;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Larasoft\WPLogger\Logger\MonologAdapterLogger\MonologAdapterLogger;

class LoggerFactory
{
	private $config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function createMonologAdapterLogger(): LoggerInterface
	{
		$logger = new Logger($this->config['name']);

		$streamHandler = new StreamHandler($this->config['file_path'], Logger::INFO);
        $streamHandler->setFormatter( new \Monolog\Formatter\JsonFormatter() );

        $logger->pushHandler($streamHandler);

        return new MonologAdapterLogger($logger);
	}
}
