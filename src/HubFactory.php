<?php declare(strict_types = 1);

namespace GrandMedia\Sentry;

use Sentry\ClientBuilder;
use Sentry\SentrySdk;
use Sentry\State\HubInterface;

final class HubFactory
{

	public static function create(string $dsn): HubInterface
	{
		$hub = SentrySdk::init();

		$client = ClientBuilder::create(['dsn' => $dsn])->getClient();
		$hub->bindClient($client);

		return $hub;
	}

}
