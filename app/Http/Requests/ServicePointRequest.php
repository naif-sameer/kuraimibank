<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicePointRequest extends FormRequest
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
    return [
      'title'           => ['required'],
      'address'         => ['required'],
      'working_hours'   => ['required'],
      'phone'           => ['required'],
      'second_phone'    => ['required'],
      'addressDetails'  => Rule::when($this->method() === 'POST', ['required']),
    ];
  }
}
