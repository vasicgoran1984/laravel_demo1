<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarServiceRequest;
use App\Http\Resources\AllCarServiceListResource;
use App\Models\BookService;
use App\Models\CarService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if ($data['oil_name']) {
            $data['oil'] = 1;
        }

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

    // Show all today Services
    public function showTodayServices()
    {
        $user = Auth()->user();
        $service_id = $user->service->id;

        $query = BookService::query()
            ->select(['BS.id', 'BS.car_id', 'BS.owner_id', 'CS.id as car_service_id', 'O.first_name', 'O.last_name', 'T.name as type_name',
                      'P.name as producer_name', 'CS.oil'])
            ->from('book_services as BS')
            ->join('cars as C', 'C.id', '=','BS.car_id')
            ->join('types as T', 'T.id', '=','C.type_id')
            ->join('producers as P', 'P.id', '=','T.producer_id')
            ->join('owners as O', 'O.id', '=','BS.owner_id')
            ->join('car_services as CS', 'CS.book_service_id', '=', 'BS.id')
            ->where([
                ['CS.service_id', $service_id],
                ['CS.created_at', '>=', Carbon::today()],
            ])->get();

        return $query;
    }

    public function showCarServiceById($service_id)
    {
        return CarService::where('id', '=', $service_id)->get();
    }
}
