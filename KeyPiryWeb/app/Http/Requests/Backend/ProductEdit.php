<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductEdit extends FormRequest
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
            "id" => "required|integer",
            "name" => "required|max:150|min:3",
            "description" => "nullable|max:3500",
            "category" => "required|integer",
            "image" => "image|mimes:jpg,jpeg,png,gif|max:2048",
            "developer" => "nullable|max:150|min:3",
            "publisher" => "nullable|max:150|min:3",
            "genre" => "nullable|max:150|min:3",
            "release_date" => "nullable|max:15|min:3",
            "seo_title" => "max:100",
            "seo_keywords" => "max:275",
            "seo_description" => "max:350",
            "status" => "nullable",
            //
        ];
    }

    public function messages()
    {
        return [
            "id.required" => "ID gereklidir",
            "id.integer" => "ID geçersizdir",

            "name.required" => "Başlık gereklidir",
            "name.max" => "Başlık en fazla :max karakter olabilir",
            "name.min" => "Başlık en az :min karakter olabilir",

            "developer.min" => "Geliştirici en az :min karakter olabilir",
            "developer.max" => "Geliştirici en fazla :min karakter olabilir",

            "publisher.min" => "Yayıncı en az :min karakter olabilir",
            "publisher.max" => "Yayıncı en fazla :min karakter olabilir",

            "genre.min" => "Tür en az :min karakter olabilir",
            "genre.max" => "Tür en fazla :min karakter olabilir",

            "release.min" => "Yayınlanma Tarihi en az :min karakter olabilir",
            "release.max" => "Yayınlanma Tarihi en fazla :min karakter olabilir",

            "description.max" => "Ürün içeriği en fazla :max karakter olabilir",

            "category.integer" => "Kategori geçersizdir",
            "category.required" => "Kategori gereklidir",

            "image.image" => "Resim dosyası seçin",
            "image.mimes" => "Resmin uzantısı 'jpg', 'jpeg', 'png' olabilir",
            "image.max" => "Dosya boyutu en fazla :max kb olabilir",

            "seo_title.max" => "Seo başlığı en fazla :max karakter olabilir",

            "seo_keywords.max" => "Seo anahtar kelimeleri en fazla :max karakter olabilir",

            "seo_description.max" => "Seo açıklaması en fazla :max karakter olabilir",
        ];
    }
}
