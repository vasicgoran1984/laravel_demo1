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
use App\Enums\ServiceName;

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
            $data['small_service_name'] = ServiceName::smallService->value;
        }

        if ($data['belt']) {
            $data['big_service_name'] = ServiceName::bigService->value;
        }

        if ($data['brake_pads_front'] || $data['brake_pads_rear']) {
            $data['brakes_service_name'] = ServiceName::brakes->value;
        }

//        echo '<pre>';
//        print_r(ServiceName::smallService->value);
//        print_r(ServiceName::smallService);
//        print_r($data);
//        echo '</pre>';
//        die('ff');

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

    public function countCarServiceByDate()
    {
        $user = Auth()->user();
        $service_id = $user->service->id;

        $query = CarService::query()
            ->select(['CS.small_service_name as small_service',
                      'CS.big_service_name as big_service',
                      'CS.brakes_service_name as brake_service',
                      DB::raw('count(CS.id) as count')])
            ->from('car_services as CS')
            ->where([
                ['CS.service_id', $service_id],
                ['CS.created_at', '>=', Carbon::today()],
            ])->groupBy('CS.small_service_name', 'CS.big_service_name', 'CS.brakes_service_name')->get();

        return $query;
    }
}
