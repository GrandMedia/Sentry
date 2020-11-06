<?php declare(strict_types = 1);

namespace GrandMediaTests\Sentry\DI;

use GrandMedia\Sentry\HubFactory;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

/**
 * @testCase
 */
final class HubFactoryTest extends \Tester\TestCase
{

	private const DSN = 'https://11111111111111111111111111111111@test.cz/1';

	public function testCreate(): void
	{
		$hub = HubFactory::create(self::DSN);

		Assert::same(self::DSN, (string) $hub->getClient()->getOptions()->getDsn());
	}

}

(new HubFactoryTest())->run();
