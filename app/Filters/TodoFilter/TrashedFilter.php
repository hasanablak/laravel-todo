<?php

namespace App\Filters\TodoFilter;

class TrashedFilter
{
	public function filter($builder, $value)
	{
		return $builder->withTrashed();
	}
}
