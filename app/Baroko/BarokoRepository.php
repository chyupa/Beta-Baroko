<?php

namespace App\Baroko;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BarokoRepository
 * @package App\Baroko
 */
class BarokoRepository implements BarokoInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BarokoRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model) {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->firstOrFail($id);
    }

    /**
     * @param $data
     * @return static
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $data
     * @return bool|int
     */
    public function update($data)
    {
        return $this->model->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

}