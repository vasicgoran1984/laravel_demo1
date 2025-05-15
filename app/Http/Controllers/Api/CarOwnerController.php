<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarOwnerRequest;
use App\Models\Car;
use App\Models\CarOwner;
use Illuminate\Http\Request;

class CarOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(CarOwnerRequest $request)
    {
//        $data['car_id'] = $request->car_id;
//        print_r($data);
//        return $data;
        $data = $request->validated();

        CarOwner::create($data);

        Car::where('id', '=', $data['car_id'])->update(['is_active' => 'active']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
