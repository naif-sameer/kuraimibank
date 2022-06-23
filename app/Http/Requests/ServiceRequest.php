<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
      'name'                => 'required',
      'description'         => 'required',
      'other_advantage'     => 'required',
      'service_conditions'  => 'required',
      'category_id'         => 'required',
      'image'               => 'image|mimes:jpeg,jpg,png|max:2048',
    ];
  }
}
