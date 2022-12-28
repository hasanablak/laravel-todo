<?php

namespace App\Filters\TodoFilter;

use App\Filters\AbstractFilter;
use App\Filters\TodoFilter\StatusFilter;
use App\Filters\TodoFilter\OnlyTrashedFilter;

class TodoFilter extends AbstractFilter
{
	protected $filters = [
		'status' => StatusFilter::class,
		'only-trashed' => OnlyTrashedFilter::class
	];
}
