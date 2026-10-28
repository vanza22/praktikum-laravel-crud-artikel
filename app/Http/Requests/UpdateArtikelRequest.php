<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateArtikelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
   
    public function rules(): array
    {
        return [
            'judul' => 'required|min:5|max:255',
            'isi' => 'required|min:20',
            'status' => 'required|in:draft,terbit',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                $slug = Str::slug($this->input('judul'));

                $adaSlugSama = \App\Models\Artikel::where('slug', $slug)
                    ->where('id', '!=', $this->route('artikel')->id)
                    ->exists();

                if ($adaSlugSama) {
                    $validator->errors()->add(
                        'judul',
                        'Judul menghasilkan slug yang sudah digunakan artikel lain.'
                    );
                }
            },
        ];
    }
}