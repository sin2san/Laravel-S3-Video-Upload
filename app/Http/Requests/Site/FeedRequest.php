<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class FeedRequest extends FormRequest {

    public function rules()
    {
        return [
            'title' => 'required',
            'video' => 'required|max:5000',
            'thumbnail' => 'required|dimensions:width=1280,height=720|max:2000|mimes:jpg, jpeg'

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title',
            'video.required' => 'Please select video',
            'video.max' => 'Uploaded video size is greater than 5MB',
            'thumbnail.required' => 'Please select thumbnail image',
            'thumbnail.dimensions' => 'The resolution of the thumbnail should be 1280 x 720 pixels',
            'thumbnail.max' => 'Uploaded image size is greater than 2MB',
            'thumbnail.mimes' => 'Please select only jpg, jpeg file'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
