<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEdit extends FormRequest
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
            "title" => "required|max:150|min:3",
            "details" => "max:2500",
            "parent" => "nullable|integer",
            "sort" => "required|integer|max:32000|min:-32000",
            "image" => "image|mimes:jpg,jpeg,png,gif|max:2048",
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

            "title.required" => "Başlık gereklidir",
            "title.max" => "Başlık en fazla :max karakter olabilir",
            "title.min" => "Başlık en az :min karakter olabilir",

            "details.max" => "Kategori içeriği en fazla :max karakter olabilir",

            "parent.integer" => "Üst kategori geçersizdir",

            "sort.integer" => "Sıralama değeri geçersizdir",
            "sort.required" => "Sıralama gereklidir",
            "sort.max" => "Sıralama değeri en fazla :max olabilir",
            "sort.min" => "Sıralama değeri en az :min olabilir",

            "image.image" => "Resim dosyası seçin",
            "image.mimes" => "Resmin uzantısı 'jpg', 'jpeg', 'png' olabilir",
            "image.max" => "Dosya boyutu en fazla :max kb olabilir",

            "seo_title.max" => "Seo başlığı en fazla :max karakter olabilir",

            "seo_keywords.max" => "Seo anahtar kelimeleri en fazla :max karakter olabilir",

            "seo_description.max" => "Seo açıklaması en fazla :max karakter olabilir",
        ];
    }
}
