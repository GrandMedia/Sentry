<?php declare(strict_types = 1);

namespace GrandMedia\Sentry\DI;

use GrandMedia\Sentry\HubFactory;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use Sentry\State\HubInterface;

final class SentryExtension extends \Nette\DI\CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure(
			[
				'dsn' => Expect::string(),
			]
		);
	}

	public function loadConfiguration(): void
	{
		/** @var \stdClass $config */
		$config = $this->getConfig();
		$containerBuilder = $this->getContainerBuilder();

		$containerBuilder->addDefinition($this->prefix('hub'))
			->setType(HubInterface::class)
			->setFactory([HubFactory::class, 'create'], ['dsn' => $config->dsn]);
	}

}
