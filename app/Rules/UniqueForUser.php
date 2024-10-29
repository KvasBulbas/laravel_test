<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
class UniqueForUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct
    (
        private readonly int $userId,
    )
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = DB::table('resting_place_user')
            ->where('user_id','=', $this->userId)
            ->where('resting_place_id','=', $value)
            ->count();

        if($count)
        {
            $fail('The place is already on the wish list');
        }

    }
}
