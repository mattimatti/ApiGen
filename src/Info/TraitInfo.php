<?php declare(strict_types = 1);

namespace ApiGenX\Info;

use ApiGenX\Index\Index;


final class TraitInfo extends ClassLikeInfo
{
	/** @var NameInfo[] indexed by [classLikeName] */
	public array $uses = [];


	public function __construct(NameInfo $name)
	{
		parent::__construct($name);
		$this->class = false;
		$this->interface = false;
		$this->trait = true;
	}


	/**
	 * @return ClassInfo[]
	 */
	public function indirectUses(Index $index): iterable
	{
		foreach ($index->classUses[$this->name->fullLower] ?? [] as $directUser) {
			yield from $index->classExtends[$directUser->name->fullLower] ?? [];
			yield from $directUser->indirectDescendants($index);
		}
	}
}