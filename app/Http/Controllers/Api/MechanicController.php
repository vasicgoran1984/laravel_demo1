<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MechanicRequest;
use App\Http\Resources\MechanicResource;
use App\Http\Resources\MechanicsListResource;
use App\Mail\CarServiceMail;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = request('per_page', 10);
        $user = Auth()->user();
        $service = $user->service->id;

        $query = Mechanic::query();
        $query->where('service_id',  "$service");

        return MechanicsListResource::collection($query->paginate($perPage));
    }

    public function getAllMechanics()
    {
        $user = Auth()->user();
        $service = $user->service->id;

        return Mechanic::where('service_id', '=',  "$service")->get(['id', 'first_name', 'last_name']);
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
    public function store(MechanicRequest $request)
    {
        $user = Auth()->user();
        $data = $request->validated();
        $data['service_id'] = $user->service->id;
        $data['phone'] = $request->phone;

        Mechanic::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mechanic $mechanic)
    {
        return new MechanicResource($mechanic);
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
    public function update(MechanicRequest $request, Mechanic $mechanic)
    {
        $data = $request->validated();
        $mechanic->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toEMail = 'vasicgoran.web@gmail.com';
        $message = 'Hello from service.';
        $subject = 'Service Info';

        Mail::to($toEMail)->send(new CarServiceMail($message, $subject));

        dd($id);
    }
}
