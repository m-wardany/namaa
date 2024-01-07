<?php

namespace  App\Http\Searches\TransactionX;

use App\Interfaces\Filter;
use App\Models\TransactionX;

final class Status implements Filter
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
        return $builder->status($value);
    }
}
