<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SocialMediaRequest extends FormRequest
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
      // 'title'        => ['required', 'unique:social_media,title, ' . $this->id],
      // TODO
      'title'        => [Rule::unique('social_media', 'title')->ignore($this->id), 'required'],
      'link'         => ['required', 'url'],
      'icon'         => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
    ];
  }
}
