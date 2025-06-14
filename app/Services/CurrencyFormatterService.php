<?php

namespace App\Services;

class CurrencyFormatterService
{
    public function formatIndianCurrency($amount)
    {
        $amount = number_format($amount, 2, '.', '');
        $amountParts = explode('.', $amount);
        $integerPart = $amountParts[0];
        $decimalPart = $amountParts[1];

        // Format the integer part according to the Indian numbering system
        $lastThreeDigits = substr($integerPart, -3);
        $remainingDigits = substr($integerPart, 0, -3);

        if (strlen($remainingDigits) > 0) {
            $remainingDigits = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $remainingDigits);
            $formattedAmount = $remainingDigits . ',' . $lastThreeDigits;
        } else {
            $formattedAmount = $lastThreeDigits;
        }

        // Append the decimal part if it's not ".00"
        if ($decimalPart != '00') {
            $formattedAmount .= '.' . $decimalPart;
        }

        return '₹ ' . $formattedAmount;
    }
}
