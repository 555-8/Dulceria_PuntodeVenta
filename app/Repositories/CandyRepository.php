<?php

namespace App\Repositories;

use App\Models\Candy;

class CandyRepository implements CandyRepositoryInterface
{
    public function all()
    {
        return Candy::all();
    }

    public function find($id)
    {
        return Candy::find($id);
    }

    public function create(array $data)
    {
        return Candy::create($data);
    }

    public function update($id, array $data)
    {
        $candy = Candy::find($id);
        $candy->update($data);
        return $candy;
    }

    public function delete($id)
    {
        return Candy::destroy($id);
    }
}
