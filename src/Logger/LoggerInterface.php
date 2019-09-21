<?php

namespace Larasoft\WPLogger\Logger;

interface LoggerInterface
{
	public function log(string $message, array $params): void;
}
