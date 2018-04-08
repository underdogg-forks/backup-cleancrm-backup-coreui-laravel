<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'parent.id' => [
                'nullable',
                'exists:menus,id'
            ],
            'url' => 'nullable|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|numeric|max:100',
            'permissions' => 'nullable|array',
            'permissions.id' => 'nullable|exists:permissions,id',
            'active' => 'boolean'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
