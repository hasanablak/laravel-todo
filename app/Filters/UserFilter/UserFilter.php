<?php

namespace App\Filters\UserFilter;

use App\Filters\AbstractFilter;
use App\Filters\UserFilter\SearchByName;

class UserFilter extends AbstractFilter
{
	protected $filters = [
		'search-by-name' => SearchByName::class
	];
}
