<?php

namespace App\Actions;

use Exception;

class CheckNumberIsIntegerAction {

    public function handle ($number){

        try {
            $number = intval($number);
            if ($number > 0){
                return true;
            }
        } catch (Exception $e){
        }
        return false;
    }

}