<?php

namespace App\Repositories;

use Spatie\LaravelData\Data;

interface RepositoryInterface
{
    public function all();

    public function create(Data  $data);

    public function update(Data $data, $id);

    public function delete($id);

    public function find($id);
}