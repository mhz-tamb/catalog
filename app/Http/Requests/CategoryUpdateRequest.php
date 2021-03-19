<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class: CategoryUpdateRequest
 * @see Illuminate\Foundation\Http\FormRequest
 * @package App\Http\Requests
 */
class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['integer'],
            'name' => ['string', 'max:255'],
            'slug' => ['string', 'max:255', 'unique:categories'],
            'description' => ['string']
        ];
    }
}
