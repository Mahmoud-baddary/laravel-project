<?php

namespace App\Rules;

use Closure;
use DB;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxValueFromDatabase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $table;
    protected $column;
    protected $id;

    public function __construct($table, $id, $column){
        $this->table = $table;
        $this->column = $column;
        $this->id = $id;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $maxValue = DB::table($this->table)->select($this->column)->where('id', $this->id)->first();
        if($value > $maxValue->stock_quantity){
            $fail("The $attribute mustn't be bigger than $maxValue->stock_quantity");
        }
    }
}
