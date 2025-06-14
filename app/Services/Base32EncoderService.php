<?php

namespace App\Services;

use Base32\Base32;

class Base32EncoderService
{
    /**
     * Encode the given string to be URL-safe.
     *
     * @param string $value
     * @return string
     */
    public function encode($value)
    {
        return Base32::encode($value);
    }

    /**
     * Decode the given URL-safe string back to its original value.
     *
     * @param string $encodedValue
     * @return string
     */
    public function decode($encodedValue)
    {
        return Base32::decode($encodedValue);
    }
}
