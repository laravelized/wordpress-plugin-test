<?php

namespace Larasoft\WPLogger\Logger\MonologAdapterLogger;

use Larasoft\WPLogger\Logger\LoggerInterface;
use Monolog\Logger;

class MonologAdapterLogger implements LoggerInterface
{
	private $logger;

	public function __construct(Logger $logger)
	{
		$this->logger = $logger;
	}

	public function log(string $message, array $params): void
	{
		$this->logger->info($message, $params);
	}
}
