<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseRepository
{
    protected const string MODEL = '';

    protected function getBuilder(): Builder
    {
        if (static::MODEL == '') {
            throw new HttpException(500, 'Model not defined');
        }

        /** @var Model $model */
        $model = new (static::MODEL)();

        return $model->newModelQuery();
    }

    public function find(array $wheres): Collection
    {
        $builder = $this->getBuilder();

        foreach($wheres as $key => $value) {
            $builder->where($key, $value);
        }

        return $builder->get();
    }

    public function first(array $wheres): ?Model
    {
        $builder = $this->getBuilder();

        foreach($wheres as $key => $value) {
            $builder->where($key, $value);
        }

        return $builder->first();
    }

    /**
     * @throws HttpException
     */
    public function findOr404(array $wheres): Collection
    {
        $results = $this->find($wheres);

        if($results->isEmpty()) {
            throw new HttpException(404, sprintf('Models of type %s not found', static::MODEL));
        }

        return $results;
    }

    /**
     * @throws HttpException
     */
    public function firstOr404(array $wheres): Model
    {
        $result = $this->first($wheres);

        if ($result === null) {
            throw new HttpException(404, sprintf('Mode of type %s not found', static::MODEL));
        }

        return $result;
    }

    public function all(): Collection
    {
        $builder = $this->getBuilder();

        return $builder->get();
    }
}
