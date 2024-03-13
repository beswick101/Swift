<?php

namespace App\Actions;

use Exception;

class CheckNumberIsRomanNumeralAction {

    public function handle ($number){

        try {

            $pattern = "/^M{0,100}(CM|CD|D?C{0,100})(XC|XL|L?X{0,100})(IX|IV|V?I{0,100})$/";
            return preg_match_all($pattern, $number);

        } catch (Exception $e){
        }
        return false;
    }

}