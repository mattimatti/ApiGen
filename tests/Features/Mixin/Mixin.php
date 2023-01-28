<?php declare(strict_types = 1);

namespace ApiGenTests\Features\Mixin;

/**
 * @method string getFoo()
 */
class Mixin
{
	public string $name = 'Hello';


	public function hello(): void
	{
	}
}
