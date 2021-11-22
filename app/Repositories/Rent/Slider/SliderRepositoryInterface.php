<?php namespace App\Repositories\Rent\Slider;

interface SliderRepositoryInterface
{
    public function get($id);

    public function all();

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
