<?php

namespace App\Services;

class NumberToWordsService
{
    protected $words = array(
        '0' => 'Zero',
        '1' => 'One',
        '2' => 'Two',
        '3' => 'Three',
        '4' => 'Four',
        '5' => 'Five',
        '6' => 'Six',
        '7' => 'Seven',
        '8' => 'Eight',
        '9' => 'Nine',
        '10' => 'Ten',
        '11' => 'Eleven',
        '12' => 'Twelve',
        '13' => 'Thirteen',
        '14' => 'Fourteen',
        '15' => 'Fifteen',
        '16' => 'Sixteen',
        '17' => 'Seventeen',
        '18' => 'Eighteen',
        '19' => 'Nineteen',
        '20' => 'Twenty',
        '30' => 'Thirty',
        '40' => 'Forty',
        '50' => 'Fifty',
        '60' => 'Sixty',
        '70' => 'Seventy',
        '80' => 'Eighty',
        '90' => 'Ninety',
        '100' => 'Hundred',
        '1000' => 'Thousand',
        '100000' => 'Lakh',
        '10000000' => 'Crore'
    );

    public function convert($number)
    {
        if ($number == 0) {
            return ' ';
        } else {
            $num = '';
            if ($number < 21) {
                $num = $this->words[$number];
            } elseif ($number < 100) {
                $num = $this->words[10 * floor($number / 10)];
                $remainder = $number % 10;
                if ($remainder > 0) {
                    $num .= ' ' . $this->words[$remainder];
                }
            } elseif ($number < 1000) {
                $num = $this->words[floor($number / 100)] . ' ' . $this->words[100];
                $remainder = $number % 100;
                if ($remainder > 0) {
                    $num .= ' ' . $this->convert($remainder);
                }
            } elseif ($number < 100000) {
                $num = $this->convert(floor($number / 1000)) . ' ' . $this->words[1000];
                $remainder = $number % 1000;
                if ($remainder > 0) {
                    $num .= ' ' . $this->convert($remainder);
                }
            } elseif ($number < 10000000) {
                $num = $this->convert(floor($number / 100000)) . ' ' . $this->words[100000];
                $remainder = $number % 100000;
                if ($remainder > 0) {
                    $num .= ' ' . $this->convert($remainder);
                }
            }
            return $num;
        }
    }
}