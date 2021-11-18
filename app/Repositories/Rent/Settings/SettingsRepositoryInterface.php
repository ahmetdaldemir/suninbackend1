<?php namespace App\Repositories\Rent\Settings;

interface SettingsRepositoryInterface
{
    public function get();

    public function all();

    public function delete($id);

    public function create(object $data);

    public function update(object $data);
}
