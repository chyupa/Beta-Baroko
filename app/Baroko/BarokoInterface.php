<?php

namespace App\Baroko;

/**
 * Interface BarokoInterface
 * @package App\Baroko
 */
interface BarokoInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $data
     * @return mixed
     */
    public function update($data);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}