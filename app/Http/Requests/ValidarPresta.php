<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValidarPresta extends Request {

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
	 * @return array
	 */
	public function rules()
	{
		return [
			//
			'origem' => 'required',
			'destino' => 'required',
			'observacoes' => 'required',
			'valor' => 'required'
		];
	}


}
