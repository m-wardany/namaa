<?php

namespace App\Repositories;

use App\Models\TransactionY;
use App\Repositories\BaseRepository;

class TransactionYRepository extends BaseRepository
{

    public function getFillableAttributes()
    {
        return [];
    }

    public function getFieldsSearchable()
    {
        return [
            'currency',
            'status',
            'balanceMin',
            'balanceMax',
        ];
    }

    public function getRelations(): array
    {
        return [];
    }

    public function orderByAttributes(): array
    {
        return [
            'id' => 'asc',
        ];
    }

    public function sortableColumns(): array
    {
        return [
            'id',
            'created_at',
        ];
    }
    /**
     * 
     * @return TransactionY
     */
    public function model()
    {
        return TransactionY::class;
    }

    public static function getFilterNamespace(): string
    {
        return 'App\Http\Searches\TransactionY';
    }

    public function indexList($search = [])
    {
        return  $this->allQuery($search)->get();
    }
}
