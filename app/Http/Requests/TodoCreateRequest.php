<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class TodoCreateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		/**
		 * usersQid eğer var ise o zaman users tablosundan da kontrol edilmeli
		 * usersQid eğer var ise auth()->user()->is_admin == 1 olmalı
		 */
		return [
			"title"	=>	"required|string|min:3",
			"usersQid"	=> function ($attribute, $value, $fail) {
				if (isset($value)) {
					if (User::where('id', $value)->count() == 0) {
						$fail("User veritabanında bulunamadı!");
					} else if (auth()->user()->is_admin != 1) {
						$fail("Bu erişimi sadece adminler yapabilir");
					}
				}
			}
		];
	}
}
