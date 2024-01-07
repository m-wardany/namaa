<?php

namespace App\Repositories;

use App\Models\TransactionX;
use App\Repositories\BaseRepository;

class TransactionXRepository extends BaseRepository
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
     * @return TransactionX
     */
    public function model()
    {
        return TransactionX::class;
    }

    public static function getFilterNamespace(): string
    {
        return 'App\Http\Searches\TransactionX';
    }

    public function indexList($search = [])
    {
        return  $this->allQuery($search)->get();
    }
}
