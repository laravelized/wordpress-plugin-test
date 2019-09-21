<?php

namespace Larasoft\WPLogger;

use Larasoft\WPLogger\Logger\LoggerFactory;
use Larasoft\WPLogger\Logger\LoggerInterface;

class WPLogger
{
	private $logger;

	public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logSignInEvent(array $data)
	{
		$this->logger->log('user has signed in', array_merge($data, ['action' => 'sign-in']));
	}

	public function logSignOutEvent(array $data)
    {
        $this->logger->log('user has signed out', array_merge($data, ['action' => 'sign-out']));
    }

    public static function init(array $config): self
    {
        $loggerFactory = new LoggerFactory([
            'name' => $config['name'],
            'file_path' => $config['file_path']
        ]);

        $logger = $loggerFactory->createMonologAdapterLogger();

        return new self($logger);
    }
}
