<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:255',
            'thumb' => 'required|min:3|max:250',
            'price' => 'required|numeric',
            'series' => 'required|min:3|max:100',
            'sale_date' => 'required|date',
            'type' => 'required|min:3|max:100'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Il nome è un campo obbligatorio',
            'name.min' => 'Il nome deve avere almeno :min caratteri',
            'name.max' => 'Il nome deve avere massimo :max caratteri',
            'description.required' => 'La descrizione è un campo obbligatorio',
            'description.min' => 'La descrizione deve avere almeno :min caratteri',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'thumb.required' => 'L\'immagine è un campo obbligatorio',
            'thumb.min' => 'L\'immagine deve avere almeno :min caratteri',
            'thumb.max' => 'L\'immagine deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'series.required' => 'La serie è un campo obbligatorio',
            'series.min' => 'La serie deve avere almeno :min caratteri',
            'series.max' => 'La serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è un campo obbligatorio',
            'sale_date.date' => 'La data di vendita di essere una data',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.min' => 'Il tipo deve avere almeno :min caratteri',
            'type.max' => 'Il tipo deve avere massimo :max caratteri',
        ];
    }
}
