<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Filters\TodoFilter\TodoFilter;
use Illuminate\Database\Eloquent\Builder;

class Todo extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = ["title", "status", "usersQid"];

	public function scopeFilter(Builder $builder)
	{
		return (new TodoFilter(request()))->filter($builder);
	}

	/**
	 * @description: Giriş yapan kullanıcı eğer admin ise usersQid'ye göre filtreleme yapılmaz
	 * @description: Eğer admin değil ise o zaman giriş yapan kullanıcya göre todo'lar için filtreleme yapılır
	 */

	public function scopeFilterByUserId($query)
	{
		return $query->where(function ($query) {
			if (!auth()->user()->is_admin) {
				return $query->where('usersQid', auth()->id());
			}
		});
	}

	public function scopeIsAdminWithTrashed($query)
	{
		return $query->where(function ($query) {
			if (auth()->user()->is_admin == 1) {
				return $query->withTradeshed();
			}
		});
	}
}
