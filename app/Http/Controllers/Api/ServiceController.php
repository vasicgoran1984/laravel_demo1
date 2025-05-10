<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $service = Service::create($data);

        return new ServiceResource($service);
    }

    public function show()
    {
        $user = Auth::user()->id;
        return Service::query()->where('user_id', '=', $user)->first();
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $serviceData = $request->validated();
        $service->update($serviceData);
    }

    public function serviceByServiceId($id)
    {
        $service =  Service::query()->where('id', '=', $id)->first();
        return new ServiceResource($service);
    }
}
