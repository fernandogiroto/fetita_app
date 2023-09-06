<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CommunitiesUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'sugar_daddy' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }

        // $this->merge([
        //     'visible' => filter_var($this->visible, FILTER_VALIDATE_BOOLEAN)
        // ]);
    }
}
