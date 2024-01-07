<?php

namespace App\Models;

use App\Interfaces\IsTransaction;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use InvalidArgumentException;

class TransactionY extends Model implements IsTransaction
{
    use HasFactory, HasTimestamps;

    const STATUS_AUTHORISED     = 100;
    const STATUS_DECLINE        = 200;
    const STATUS_REFUNDED       = 300;

    protected $table = 'transaction_y';

    protected $fillable = [
        'balance',
        'currency',
        'email',
        'status',
    ];


    static function statusList(): array
    {
        return [
            self::STATUS_AUTHORISED => 'authorised',
            self::STATUS_DECLINE => 'decline',
            self::STATUS_REFUNDED => 'refunded',
        ];
    }

    public function scopeCurrency(Builder $query, $currency): void
    {
        $query->where('currency', $currency);
    }

    public function scopeBalanceMin(Builder $query, $balanceMin): void
    {
        if (!is_numeric($balanceMin)) {
            throw new InvalidArgumentException("Invalid argument provided for balance filter");
        }
        $query->where('balance', '>=', $balanceMin);
    }

    public function scopeBalanceMax(Builder $query, $balanceMax): void
    {
        if (!is_numeric($balanceMax)) {
            throw new InvalidArgumentException("Invalid argument provided for balance filter");
        }
        $query->where('balance', '<=', $balanceMax);
    }

    public function scopeStatus(Builder $query, $status): void
    {
        $statusId =  data_get(array_flip(self::statusList()), $status);
        if ($statusId) {
            $query->where('status', $statusId);
        } else {
            throw new InvalidArgumentException("Invalid transaction status: {$status}");
        }
    }
}
