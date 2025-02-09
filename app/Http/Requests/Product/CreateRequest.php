<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'qr_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là một chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'qr_image.required' => 'Ảnh không được để trống',
            'qr_image.image' => 'Ảnh QR phải là một tệp hình ảnh.',
            'qr_image.mimes' => 'Ảnh QR chỉ được có định dạng jpeg, png, jpg, gif, svg.',
            'qr_image.max' => 'Ảnh QR không được vượt quá 2MB.',
            'logo.image' => 'Logo phải là một tệp hình ảnh.',
            'logo.required' => 'Ảnh không được để trống',
            'logo.mimes' => 'Ảnh Logo chỉ được có định dạng jpeg, png, jpg, gif, svg.',
            'logo.max' => 'Ảnh Logo không được vượt quá 2MB.',
        ];
    }
}
