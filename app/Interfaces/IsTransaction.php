<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface IsTransaction
{
    public function scopeCurrency(Builder $query, $currency): void;
    public function scopeBalanceMax(Builder $query, $balanceMax): void;
    public function scopeBalanceMin(Builder $query, $balanceMin): void;
    public function scopeStatus(Builder $query, $status): void;
}
