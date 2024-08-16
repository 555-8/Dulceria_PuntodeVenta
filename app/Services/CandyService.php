<?php

namespace App\Services;

use App\Repositories\CandyRepositoryInterface;

class CandyService
{
    protected $candyRepository;

    public function __construct(CandyRepositoryInterface $candyRepository)
    {
        $this->candyRepository = $candyRepository;
    }

    public function createCandy(array $data)
    {
        // Lógica de negocio para crear un dulce
        return $this->candyRepository->create($data);
    }

    public function updateCandy($id, array $data)
    {
        // Lógica de negocio para actualizar un dulce
        return $this->candyRepository->update($id, $data);
    }

    public function deleteCandy($id)
    {
        // Lógica de negocio para eliminar un dulce
        return $this->candyRepository->delete($id);
    }

    public function getAllCandies()
    {
        // Lógica de negocio para obtener todos los dulces
        return $this->candyRepository->all();
    }

    public function getCandy($id)
    {
        // Lógica de negocio para obtener un dulce
        return $this->candyRepository->find($id);
    }
}
