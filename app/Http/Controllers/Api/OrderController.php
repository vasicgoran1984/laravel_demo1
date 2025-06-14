<?php

namespace App\Http\Controllers\Api;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderListResource;
use App\Http\Resources\OrderResource;
use App\Mail\OrderUpdateEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $search = request('search', false);
        $perPage = request('per_page', 10);
        $sortField = request('sort_field', 'updated_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = Order::query()
            ->withCount('items')
            ->orderBy($sortField, $sortDirection);

        if ($search) {
            $query->where('total_price', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        }

        return OrderListResource::collection($query->paginate($perPage));
    }

    public function view(Order $order)
    {
        return new OrderResource($order);
    }

    public function getStatuses()
    {
        return OrderStatus::getStatuses();
    }

    public function changeStatus(Order $order, $status)
    {

        $order->status = $status;
        $order->save();

        // Send Email on Update Status
        Mail::to($order->user)->send(new OrderUpdateEmail($order));

        return response('', 200);
    }
}
