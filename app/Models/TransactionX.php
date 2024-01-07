<?php

namespace App\Models;

use App\Interfaces\IsTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use InvalidArgumentException;

class TransactionX extends Model implements IsTransaction
{
    use HasFactory, HasTimestamps;

    const STATUS_AUTHORISED     = 1;
    const STATUS_DECLINE        = 2;
    const STATUS_REFUNDED       = 3;

    protected $table = 'transaction_x';

    protected $fillable = [
        'parentAmount',
        'Currency',
        'parentEmail',
        'statusCode',
        'registerationDate',
        'parentIdentification',
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
        $query->where('Currency', $currency);
    }

    public function scopeBalanceMin(Builder $query, $balanceMin): void
    {
        if (!is_numeric($balanceMin)) {
            throw new InvalidArgumentException("Invalid argument provided for balance filter");
        }
        $query->where('parentAmount', '>=', $balanceMin);
    }

    public function scopeBalanceMax(Builder $query, $balanceMax): void
    {
        if (!is_numeric($balanceMax)) {
            throw new InvalidArgumentException("Invalid argument provided for balance filter");
        }
        $query->where('parentAmount', '<=', $balanceMax);
    }

    public function scopeStatus(Builder $query, $status): void
    {
        $statusId =  data_get(array_flip(self::statusList()), $status);
        if ($statusId) {
            $query->where('statusCode', $statusId);
        } else {
            throw new InvalidArgumentException("Invalid transaction status: {$status}");
        }
    }
}
