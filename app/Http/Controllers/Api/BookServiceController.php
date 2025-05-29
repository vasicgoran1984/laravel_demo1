<?php

namespace App\Http\Controllers\Api;

use App\Enums\CarActive;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookServiceRequest;
use App\Http\Resources\BookSerListResource;
use App\Http\Resources\BookServiceListResource;
use App\Models\BookService;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookServiceController extends Controller
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

        $query = BookService::query()
            ->select(['BS.id', 'BS.car_id', 'BS.owner_id', 'C.chassis_number', 'O.first_name', 'O.last_name', 'O.city', 'T.name as type_name', 'P.name as producer_name', 'O.updated_at'])
            ->from('book_services as BS')
            ->join('cars as C', 'C.id', '=','BS.car_id')
            ->join('types as T', 'T.id', '=','C.type_id')
            ->join('producers as P', 'P.id', '=','T.producer_id')
            ->join('owners as O', 'O.id', '=','BS.owner_id');
        $query->orderBy($sortField, $sortDirection);
        $query->where('BS.service_id',  "$service")->with(['cars', 'owners']);

        if ($search) {
            $query->WhereRaw(
                "concat(first_name, ' ', last_name) like '%" . $search . "%' "
            );
        }

        return new BookSerListResource($query->paginate($perPage));

//        return response([
//            'data' => BookServiceListResource::collection($query->paginate($perPage)),
//        ], 200);
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
    public function store(BookServiceRequest $request)
    {
        $user = Auth()->user();
        $data = $request->validated();
        $data['service_id'] = $user->service->id;
        $data['date'] = (new \DateTime())->format( 'Y-m-d H:i:s' );

        $bookService = BookService::create($data);

        Car::where('id', '=', $data['car_id'])->update(['is_active' => 'active']);

        return response([
            'bookService' => $bookService,
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        print_r('index');
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
        return 'update...';
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Get info for Last Book Service Created
    public function lastBookService($id)
    {
        $query = BookService::query()
            ->select(['BS.id', 'P.name as producer_name', 'C.plate_number', 'T.name as type_name', 'C.chassis_number', 'BS.date', 'BS.kilometers', 'O.first_name', 'O.last_name', 'O.city', 'O.phone'])
            ->from('book_services as BS')
            ->join('cars as C', 'C.id', '=', 'BS.car_id')
            ->join('types as T', 'T.id', '=', 'C.type_id')
            ->join('producers as P', 'P.id', '=', 'T.producer_id')
            ->join('owners as O', 'O.id', '=', 'BS.owner_id')
            ->where('BS.id', '=', $id);

        return $query->first();
    }

    public function insertKilometers($id, Request $request)
    {
//        return $request->km;
//        dd($id);
        $bookService = BookService::where('id', '=', $id)->update(['kilometers' => $request->km]);
    }
}
