<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;

class InvoiceRepository {

    public function create ($workshopId, $orderId, $request) {
        $invoice = Invoice::where('order_id', $orderId)->exists();

        if($invoice) {
            return false;
        }

        $invoice = new Invoice();

        $order = Order::find($orderId);

        $invoice->name = $request->name;
        $invoice->is_discount = 0;

        if($request->discount) {
            $invoice->is_discount = $request->discount;
        }
        $invoice->order_id = $orderId;
        $invoice->user_id = $order->client_id;
        $invoice->workshop_id = $workshopId;

        $netto = $request->netto;

        if($request->discount) {
            $netto = $netto - ($netto * 0.10);
        }

        $invoice->netto_value = 1;

        $invoice->comment = $request->comment;
        $invoice->save();

        $user = User::find($order->client_id);
        $user->discount_counter = $user->discount_counter + 1;
        $user->save();

        return true;
    }

    public function findById ($id) {
        return Invoice::where('id', $id)->with('user')
            ->with('workshop')
            ->with('order')
            ->first();
    }

    public function filter ($dateStart, $dateEnd) {
        return Invoice::where('created_at', '>=', $dateStart)
            ->where('created_at', '<=', $dateEnd)
            ->count();
    }

    public function invoicesNettoByDatefilter ($dateStart, $dateEnd) {
        return Invoice::where('created_at', '>=', $dateStart)
            ->where('created_at', '<=', $dateEnd)
            ->sum('netto_value');
        }
}
