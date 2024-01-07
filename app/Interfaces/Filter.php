<?php

namespace App\Interfaces;

interface Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param mixed $builder
     * @param mixed $value
     * @return mixed $builder
     */
    public static function apply($builder, $value);
}
