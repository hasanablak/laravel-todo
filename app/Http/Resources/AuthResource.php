<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
	public $token;

	public function __construct($token = null)
	{
		$this->token = $token;
	}
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */

	public function toArray($request)
	{
		if (!$this->token) {
			return [
				'status' => 'error',
				'message' => 'Unauthorized',
			];
		}

		return [
			"user" =>	auth()->user(),
			"token" =>	$this->token,
			"token_type" => "Bearer",
		];
	}
}
