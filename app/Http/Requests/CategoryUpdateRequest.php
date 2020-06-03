<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        #reading: title,' . $this->route('categories'),
        # copy column name , define the cat id so this unique validation will all categories except current cat
        # php artisan route:list in order to know if is categories or category
        # backend/categories/{category}
        return [
            //
            'title' => 'required|max:255|unique:categories,title,' . $this->route('category'),
            'slug'  => 'required|max:255|unique:categories,slug,' . $this->route('category'),
        ];

    }
}
