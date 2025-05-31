<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use App\Http\Resources\OwnersListResource;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
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

        $query = Owner::query();

        $query->orderBy($sortField, $sortDirection);
        $query->where('service_id',  "$service");

        if ($search) {
            $query->where(DB::raw("first_name"), "like", "%".$search."%")
                ->orWhere(DB::raw("last_name"), "like", "%".$search."%")
                ->where('service_id',  "$service");
        }

        return OwnersListResource::collection($query->paginate($perPage));
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
    public function store(OwnerRequest $request)
    {
        $user = Auth()->user();
        $data = $request->validated();
        $data['service_id'] = $user->service->id;
        Owner::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Owner::where('id', '=', $id)->first();
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
    public function update(OwnerRequest $request, Owner $owner)
    {
        $data = $request->validated();
        $data['email'] = $request->get('email');

        $owner->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
