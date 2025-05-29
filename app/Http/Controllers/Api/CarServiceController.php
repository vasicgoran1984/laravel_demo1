<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarServiceRequest;
use App\Http\Resources\AllCarServiceListResource;
use App\Models\CarService;
use Illuminate\Http\Request;

class CarServiceController extends Controller
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
    public function store(CarServiceRequest $request)
    {
        $data = $request->validated();
        $user = Auth()->user();
        $data['service_id'] = $user->service->id;
        $data['description'] = $request->description;
        $data['oil_name'] = $request->oil_name;

        CarService::create($data);
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

    public function showAllServices($book_id)
    {
        $carService = CarService::where('book_service_id', '=', $book_id)->get();

        return $carService;

    }
}
