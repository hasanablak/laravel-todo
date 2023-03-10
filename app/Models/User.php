<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Hash;
use App\Filters\UserFilter\UserFilter;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements JWTSubject
{
	use	HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass	assignable.
	 *
	 * @var	array<int, string>
	 */
	protected $fillable	= [
		'name',
		'email',
		'password',
		'is_admin'
	];

	/**
	 * The attributes that should be hidden	for	serialization.
	 *
	 * @var	array<int, string>
	 */
	protected $hidden =	[
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var	array<string, string>
	 */
	protected $casts = [
		'email_verified_at'	=> 'datetime',
	];

	public function	getJWTIdentifier()
	{
		return $this->getKey();
	}
	public function getJWTCustomClaims()
	{
		return [];
	}

	protected function password(): Attribute
	{
		return new Attribute(
			//get: fn($value) => "",
			set: fn ($value) => Hash::make($value)
		);
	}

	public function scopeFilter(Builder $builder)
	{
		return (new UserFilter(request()))->filter($builder);
	}
}
