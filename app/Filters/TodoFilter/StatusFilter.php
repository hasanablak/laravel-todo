<?php

namespace App\Filters\TodoFilter;

class StatusFilter
{
	public function filter($builder, $value)
	{
		return $builder->where('is_complated', $value);
	}
}
