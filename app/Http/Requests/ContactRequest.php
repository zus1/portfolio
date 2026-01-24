<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'string|max:255',
            'phone' => 'phone:INTERNATIONAL',
            'social' => 'url',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Value must be valid email',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name can not have more then 255 characters',
            'phone.phone' => 'Phone must be a valid international phone number',
            'social.url' => 'Social must be a valid url',
            'subject.required' => 'Subject is required',
            'subject.string' => 'Subject must be a valid string',
            'subject.max' => 'Subject can not have more then 255 characters',
            'message.required' => 'Message is required',
            'message.max' => 'Message can not have more then 2000 characters',
            'message.string' => 'Message must be a string',
        ];
    }
}
