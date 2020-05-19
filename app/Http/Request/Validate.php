<?php
namespace App\Http\Request;


class Validate
{
    static function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'phone' => ['required', 'max:20'],
            'text_area' => ['required', 'max:500'],
        ];
    }
}
