<?php

namespace  App\Http\Searches\TransactionY;

use App\Interfaces\Filter;


final class Currency implements Filter
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
        return $builder->currency($value);
    }
}
