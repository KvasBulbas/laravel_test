<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class MaxDuplicates implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function __construct
    (
        private readonly string $table,
        private readonly string $column,
        private readonly int $idFromPath,
        private readonly int $maxDuplicates,
    )
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = DB::table($this->table)
            ->where($this->column,'=',$this->idFromPath)
            ->count();


        if ($count >= $this->maxDuplicates) {
            $fail("Places on the user wish list  no more then $this->maxDuplicates");
        }
    }
}
