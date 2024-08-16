<?php

namespace App\Http\Controllers;

use App\Services\CandyService;
use Illuminate\Http\Request;

class CandyController extends Controller
{
    protected $candyService;

    public function __construct(CandyService $candyService)
    {
        $this->candyService = $candyService;
    }

    public function index()
    {
        $candies = $this->candyService->getAllCandies();
        return view('candies.index', compact('candies'));
    }

    public function create()
    {
        return view('candies')->with('success', 'Dulce registrado con éxito');
    }

    public function store(Request $request)
    {
        $this->candyService->createCandy($request->all());
        return redirect()->route('candies')->with('success', 'Dulce registrado con éxito');
    }

    public function edit($id)
{
    $candy = $this->candyService->getCandy($id);
    return view('edit', compact('candy'));
}

public function update(Request $request, $id)
{
    $this->candyService->updateCandy($id, $request->all());
    return redirect()->route('inventory')->with('success', 'Dulce actualizado con éxito');
}

public function destroy($id)
{
    $this->candyService->deleteCandy($id);
    return redirect()->route('candies')->with('success', 'Dulce eliminado con éxito');
}

}
