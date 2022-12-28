<?php

namespace App\Filters\TodoFilter;

class OnlyTrashedFilter
{
	public function filter($builder, $value)
	{
		return $builder->onlyTrashed();
	}
}
