<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return Type::where('producer_id', '=', $id)->get();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function view(Type $type)
    {

    }


    public function getProducerType($id)
    {
        $type = Type::query()
            ->select('T.id AS type_id', 'T.name AS type_name', 'P.name AS producer_name')
            ->from('types as T')
            ->where('T.id', '=', $id)
            ->join('producers as P', 'P.id', '=', 'T.producer_id')
            ->first();

        return $type;

//        print_r($type);
//
//        return $type->producer();
        //return TypeResource::collection($type);
        //return new TypeResource($type);
    }
}
