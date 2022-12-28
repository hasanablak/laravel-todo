<?php

namespace App\Filters\UserFilter;

class SearchByName
{
	public function filter($builder, $value)
	{
		return $builder->where('name', 'like', '%' . $value . '%');
	}
}
