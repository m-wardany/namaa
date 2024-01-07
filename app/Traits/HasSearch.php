<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSearch
{
    public static function apply($filters, &$query, $searchable = [])
    {
        $query = static::applyDecoratorsFromFilters($filters, $query, $searchable);
    }

    private static function applyDecoratorsFromFilters($filters, $query, $searchable = [])
    {
        foreach ($filters as $filterName => $value) {
            if (in_array($filterName, $searchable)) {
                $decorator = static::createFilterDecorator($filterName);
                if (static::isValidDecorator($decorator) && !is_null($value)) {
                    $query = $decorator::apply($query, $value);
                }
            }
        }

        return $query;
    }

    private static function createFilterDecorator($name)
    {
        $path = explode('\\', static::getFilterNamespace());
        $path[] = Str::studly($name);
        return implode('\\', $path);
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }
}
