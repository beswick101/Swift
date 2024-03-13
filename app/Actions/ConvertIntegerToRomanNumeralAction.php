<?php

namespace App\Actions;

use Exception;

class ConvertIntegerToRomanNumeralAction {

    public function handle ($number){
       
        // Higher values can be used with the macron wich multiplies values by 1000
        $roman_values = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];
    
        $result = '';
        
        foreach ($roman_values as $roman => $value)
        {
            // divide to get matches 
            $matches = intval($number /$value);
    
            // assign the roman character
            $result .= str_repeat($roman, $matches);
    
            // substract from the number
            $number = $number % $value;
        }       

        return $result;
    }

}