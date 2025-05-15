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

        $query = Car::query();

        $query->orderBy($sortField, $sortDirection);

        if ($search) {
            $query->where('chassis_number', 'like', "%{$search}%")
                ->orWhere('engine_number', 'like', "%{$search}%")
                ->orWhere('plate_number', 'like', "%{$search}%");
        }

        return CarsListResource::collection($query->paginate($perPage));
    }

    public function getCarsToAddOwner()
    {
        $search = request('search', false);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Car::query()
            ->select(['C.id', 'C.chassis_number', 'C.engine_number', 'C.year', 'C.plate_number',
                      'C.volume', 'C.power', 'C.updated_at', 'C.created_at', 'P.name as producer_name',
                      'T.name as type_name'])
            ->from('cars as C')
            ->join('types as T', 'C.type_id', '=', 'T.id')
            ->join('producers as P', 'T.producer_id', '=', 'P.id')
            ->where('C.is_active', '=', CarActive::Inactive->value);


        $query->orderBy($sortField, $sortDirection);

        if ($search) {
            $query->where('chassis_number', 'like', "%{$search}%")
                  ->orWhere('engine_number', 'like', "%{$search}%")
                  ->orWhere('plate_number', 'like', "%{$search}%");
        }

        //return CarsListResource::collection($query->paginate($perPage));
        return $query->get();
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
        $data = $request->validated();
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
