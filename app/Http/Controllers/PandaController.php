<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePandaRequest;
use App\Http\Requests\UpdatePandaRequest;
use App\Models\Panda;
use \App\Http\Resources\PandaResource;

class PandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pandas = Panda::all();
        return PandaResource::collection($pandas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePandaRequest $request)
    {
        $data = $request()->validate([
            "name" => "required|min:1",
            "sex" => ["required",Rule::in(['M', 'F']),],
            "birth" => "date"
        ]);
        return Panda::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Panda $panda)
    {
        return new PandaResource($panda);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panda $panda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePandaRequest $request, Panda $panda)
    {
        $data = $request->validated();
        $panda->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panda $panda)
    {
        return Panda::destroy($panda->getKey());
    }
}
