<?php

namespace  App\Http\Searches\TransactionX;

use App\Interfaces\Filter;


final class BalanceMax implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param mixed $builder
     * @param mixed $value
     * @return mixed $builder
     */
    public static function apply($builder, $value)
    {
        return $builder->balanceMax($value);
    }
}
