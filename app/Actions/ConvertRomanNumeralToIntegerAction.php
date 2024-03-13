<?php

namespace App\Actions;

use Exception;

class ConvertRomanNumeralToIntegerAction {

    public function handle ($number){
       
        // Higher values can be used with the macron which multiplies values by 1000
        $roman_values = [
            'I' => 1, 
            'V' => 5, 
            'X' => 10, 
            'L' => 50,
            'C' => 100, 
            'D' => 500,
            'M' => 1000,
        ];
    
        $result = 0;
        
        for ($i = 0, $length = strlen($number); $i < $length; $i++) {
            // getting value of current char
            $value = $roman_values[$number[$i]];
            // getting value of next char - null if there is no next char
            $nextvalue = !isset($number[$i + 1]) ? null : $roman_values[$number[$i + 1]];
            // adding/subtracting value from result based on $nextvalue
            $result += (!is_null($nextvalue) && $nextvalue > $value) ? -$value : $value;
        }
      
        return $result;
    }

}