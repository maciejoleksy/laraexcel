<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'first_number'   => 'required|min:1',
            'first_brutto'   => 'required|min:1',
            'second_number'  => 'required|min:1',
            'second_brutto'  => 'required|min:1',
            'first_file'            => 'required|mimes:xlsx,xls',
            'second_file'           => 'required|mimes:xlsx,xls',
        ];
    }

    public function messages()
    {
        return [
            'first_number.required'  => 'Wypisz kolumne dla pierwszego pliku, pole Źródłowy.',
            'first_brutto.required'  => 'Wypisz kolumne dla pierwszego pliku, pole Brutto.',
            'second_number.required' => 'Wypisz kolumne dla drugiego pliku, pole Źródłowy.',
            'second_brutto.required' => 'Wypisz kolumne dla drugiego pliku, pole Brutto.',
            'first_file.required'           => 'Załaduj pierwszy plik.',
            'second_file.required'          => 'Załaduj drugi plik.',
            'first_file.mimes'              => 'Plik pierwszy musi być w formacie: xlsx lub xls.',
            'second_file.mimes'             => 'Drugi pierwszy musi być w formacie: xlsx lub xls.',
        ];
    }
}
