<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookService;
use App\Models\Car;
use App\Models\CarService;
use App\Models\Owner;
use App\Models\Producer;
use App\Models\Type;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
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
    public function store(Request $request)
    {
        //
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

    public function exportPdf($serviceId, $userId)
    {

        $data['user'] = User::query()
            ->select(['U.id', 'U.first_name', 'U.last_name', 'U.email', 'S.name_service', 'S.city', 'S.address', 'S.phone'])
            ->from('users as U')
            ->join('services as S', 'U.id', '=', 'S.user_id')
            ->where('U.id', '=', $userId)->first();

        $data['service'] = CarService::where('id', '=', $serviceId)->first();
        $data['bookService'] = BookService::where('id', '=', $data['service']['book_service_id'])->first();
        $data['car'] = Car::where('id', '=', $data['bookService']['car_id'])->first();
        $data['type'] = Type::where('id', '=', $data['car']['type_id'])->first();
        $data['producer'] = Producer::where('id', '=', $data['type']['producer_id'])->first();
        $data['owner'] = Owner::where('id', '=', $data['bookService']['owner_id'])->first();

//        $data['user'] = [
//            'name' => 'Ime',
//        ];

//        echo '<pre>';
//        print_r($data['service']);
//        echo '</pre>';
//        dd('x');

        $pdf = Pdf::loadView('pdf', compact('data'));

        return $pdf->stream();

        //return view('export-pdf', compact('data'));

    }
}
