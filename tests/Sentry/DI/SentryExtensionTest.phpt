<?php declare(strict_types = 1);

namespace GrandMediaTests\Sentry\DI;

use Nette\Configurator;
use Nette\DI\Container;
use Sentry\State\HubInterface;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * @testCase
 */
final class SentryExtensionTest extends \Tester\TestCase
{

	public function testFunctionality(): void
	{
		$container = $this->createContainer(null);

		$hub = $container->getByType(HubInterface::class);
		Assert::true($hub instanceof HubInterface);
	}

	private function createContainer(?string $configFile): Container
	{
		$config = new Configurator();

		$config->setTempDirectory(\TEMP_DIR);
		$config->addConfig(__DIR__ . '/config/reset.neon');
		if ($configFile !== null) {
			$config->addConfig(__DIR__ . \sprintf('/config/%s.neon', $configFile));
		}

		return $config->createContainer();
	}

}

(new SentryExtensionTest())->run();
