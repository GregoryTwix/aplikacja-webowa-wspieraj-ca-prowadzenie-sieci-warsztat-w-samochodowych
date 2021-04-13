<?php

namespace App\Repositories;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderRepository {

    public function makeOrder($date, $workshopId, $description) {
        $order = new Order();
        $order->client_id = Auth::user()->id;
        $order->date = $date;

        if($date <= Carbon::now()) {
            return false;
        }

        $order->date = $date;
        $order->workshop_id = $workshopId;
        $order->description = $description;
        $order->staff_note = '';
        $order->save();

        return true;
    }

    public function getCurrentByUserIdWithData($Id) {
        return Order::where('client_id', $Id)
            ->where('date', '>=', Carbon::now())
            ->with('user')
            ->with('workshop')
            ->with('invoice')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function getHistoryByUserIdWithData($Id) {
        return Order::where('client_id', $Id)
            ->where('date', '<', Carbon::now())
            ->with('user')
            ->with('workshop')
            ->with('invoice')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function getWorkshopCurrentData($Id) {
        return Order::where('date', '>=', Carbon::now())
            ->where('workshop_id', $Id)
            ->with('user')
            ->with('workshop')
            ->with('invoice')
            ->orderBy('date', 'desc')
            ->paginate(15);
    }

    public function findById($id) {
        return Order::where('id', $id)->with('workshop')->first();
    }

    public function changeDate($id, $date) {
        $order = Order::find($id);
        $order->status = 1;
        $order->date = $date;
        $order->save();

        return true;
    }

    public function changeCost($id, $cost) {
        $order = Order::find($id);
        $order->cost = $cost;
        $order->save();

        return true;
    }

    public function setStatus($id, $status) {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
    }

    public function getDoneFromThisMonth($date, $workshopId) {
        return Order::where('date', $date)->where('workshop_id', $workshopId)->where('status', 3)->count();
    }

    public function filter($dateStart, $dateEnd) {
        return Order::where('created_at', '>=', $dateStart)
            ->where('created_at', '<=', $dateEnd)
            ->count();
    }
}
