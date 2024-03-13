<?php

namespace App\Console\Commands;

use App\Actions\CheckNumberIsIntegerAction;
use App\Actions\CheckNumberIsRomanNumeralAction;
use App\Actions\ConvertIntegerToRomanNumeralAction;
use App\Actions\ConvertRomanNumeralToIntegerAction;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class AcceptNumber extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:accept-number {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enter an Integer or Roman Numberal number between 1 and 100,000';

    /**
    *   Actions
    */
    protected CheckNumberIsIntegerAction $is_integer;
    protected CheckNumberIsRomanNumeralAction $is_roman_numeral;
    protected ConvertRomanNumeralToIntegerAction $convert_roman_numeral_to_integer;
    protected ConvertIntegerToRomanNumeralAction $convert_integer_to_roman_numeral;

    public function __construct(
        CheckNumberIsIntegerAction $is_integer,
        CheckNumberIsRomanNumeralAction $is_roman_numeral,
        ConvertRomanNumeralToIntegerAction $convert_roman_numeral_to_integer,
        ConvertIntegerToRomanNumeralAction $convert_integer_to_roman_numeral
        )
    {
        parent::__construct();
        $this->is_integer = $is_integer;
        $this->is_roman_numeral = $is_roman_numeral;
        $this->convert_roman_numeral_to_integer = $convert_roman_numeral_to_integer;
        $this->convert_integer_to_roman_numeral = $convert_integer_to_roman_numeral;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $number = $this->argument('number');

        $is_integer = $this->is_integer->handle($number);
        $is_roman_numeral = $this->is_roman_numeral->handle($number);

        if (!$is_integer && !$is_roman_numeral){
            echo "Sorry number entered is neither an integer or a Roman Numeral".PHP_EOL;
            exit();
        }

        if ($is_integer){
            $roman_numeral_number = $this->convert_integer_to_roman_numeral->handle($number);
            $integer_number = $number;
        }

        if ($is_roman_numeral){
            $integer_number = $this->convert_roman_numeral_to_integer->handle($number);
            $roman_numeral_number = $number;
        }

        if ($integer_number <= 100000){
            $result = "Accepted";
        } else {
            $result = "is too high";
        }

        echo "Integer: ".$integer_number.PHP_EOL;
        echo "Roman Numeral: ".$roman_numeral_number.PHP_EOL;
        echo "Result: ".$result.PHP_EOL;

    }

    protected function promptForMissingArgumentsUsing()
    {
        return [
            'number' => 'Please enter a number',
        ];
    }


}
