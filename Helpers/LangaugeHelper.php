<?php

use App\Models\Translation;

if(!function_exists('translate')) {
    function translate($key, $lang = 'en') {
        $translation = Translation::where('key', $key)
                    ->where('language', $lang)
                    ->first();

        return $translation ? $translation->value : $key;
    }
}

