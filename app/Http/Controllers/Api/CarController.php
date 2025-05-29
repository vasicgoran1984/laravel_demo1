<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarsListResource;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Enums\CarActive;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $user = Auth()->user();
        $service = $user->service->id;

        $query = Car::query();
        $query->orderBy($sortField, $sortDirection);
        $query->where('service_id',  "$service");

        if ($search) {
            $query->whereHas('service')
                ->where('chassis_number', 'like', "%{$search}%");
        }

        return CarsListResource::collection($query->paginate($perPage));
    }

    public function getCarsToAddOwner()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);

        $query = Car::query();
        $query->doesntHave('bookService')->get();

        if ($search) {
            $query->whereHas('service')
                ->where('chassis_number', 'like', "%{$search}%");
        }

        return CarsListResource::collection($query->paginate($perPage));
    }

    public function showAllCars()
    {
        return Car::query()->get();
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
    public function store(CarRequest $request)
    {
        $user = Auth()->user();
        $data = $request->validated();
        $data['service_id'] = $user->service->id;
        Car::create($data);
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
