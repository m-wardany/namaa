<?php

namespace App\Repositories;

use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as Application;

abstract class BaseRepository
{
    use HasSearch;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    abstract public function getFillableAttributes();

    abstract public function orderByAttributes(): array;

    abstract public function sortableColumns(): array;

    abstract public function getRelations(): array;

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    abstract public static function getFilterNamespace(): string;

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($search = [], $columns = ['*'], $with = null, $perPage = null,)
    {
        if (!$perPage) {
            $perPage = config('app.per_page');
        }

        $query = $this->allQuery($search, $with);

        return $query->paginate($perPage, $columns);
    }

    /**
     * 
     * @param array $filters
     * @return Model
     */
    public function search($query, array $filters)
    {
        $this->apply($filters, $query, $this->getFieldsSearchable());
        return $query;
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param string|array|null $with
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $with = null)
    {
        $query = $this->model->newQuery();

        if (count($search)) {
            $query = $this->search($query, $search);
        }

        if (!empty($with)) {
            $query->with($with);
        }

        $this->getOrderBy($query);

        return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $columns = ['*'], $with = null)
    {
        $query = $this->allQuery($search, $with);

        return $query->get($columns);
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    public function findById($id)
    {
        $query = $this->model->newQuery();

        return $query->findOrFail($id);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }


    public function getOrderBy(&$query)
    {
        $sortableColumns = $this->sortableColumns();
        $sortColumn = request('sort');
        $sortDirection = 'asc';

        if (substr($sortColumn, 0, 1) === '-') {
            $sortColumn = substr($sortColumn, 1);
            $sortDirection = 'desc';
        }

        if (in_array($sortColumn, $sortableColumns)) {
            $query->orderBy($sortColumn, $sortDirection);
        }
        $orderBy = $this->orderByAttributes();
        foreach ($orderBy as $sortableColumn => $sortDirection) {
            if ($sortDirection == 'RAW') {
                $query->orderByRaw($sortableColumn);
            } else {
                $query->orderBy($sortableColumn, $sortDirection);
            }
        }
    }
}
