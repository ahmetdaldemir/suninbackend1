<?php namespace App\Repositories\Language;

interface LanguageRepositoryInterface
{
    public function get($id);

    public function all();

    public function create(object $data);

    public function delete($id);

    public function update(object $data);
}
