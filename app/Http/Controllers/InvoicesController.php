<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice;
use App\Models\Order;
use App\Repositories\InvoiceRepository;
use App\Repositories\UserRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;


class InvoicesController extends Controller
{
    private $repository;

    public function __construct(InvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    //formularz dodawania faktury
    public function createForm($workshopId, $orderId) {
        if($this->authorize('invoiceManage', $workshopId)) {
            $order = Order::where('id', $orderId)->with('user')->first();

            return view('invoices.create', [
                'workshopId' => $workshopId,
                'orderId' => $orderId,
                'order' => $order
            ]);
        }
    }

    //tworzenie faktury
    public function create($workshopId, $orderId, Invoice $request) {
        if($this->authorize('invoiceManage', $workshopId)) {
            $create = $this->repository->create($workshopId, $orderId, $request);

            if ($create) {
                Session::Flash('message', 'Pomyślnie dodano fakturę');
            } else {
                Session::Flash('error', 'Istnieje już faktura dla tego zamówienia');
            }


            return redirect()->back();
        }
    }

    //podgląd faktury
    public function show ($workshopId, $invoiceId) {
        if($this->authorize('invoiceShow', $workshopId)) {
            $invoice = $this->repository->findById($invoiceId);

            $paymentDate = new Carbon($invoice->created_at);
            $paymentDate->addDays(14);
            $brutto = $invoice->order->cost * 1.23;

            return view('invoices.show', [
                'workshopId' => $workshopId,
                'invoice' => $invoice,
                'paymentDate' => $paymentDate,
                'brutto' => $brutto
            ]);
        }
    }

    public function download($workshopId, $invoiceId) {
        if($this->authorize('invoiceShow', $workshopId)) {
            $invoice = $this->repository->findById($invoiceId);

            $paymentDate = Carbon::parse($invoice->created_at)->addDays(14)->format('Y-m-d');

            $brutto = $invoice->order->cost * 1.23;

            $data = [
                'workshopId' => $workshopId,
                'invoice' => $invoice,
                'paymentDate' => $paymentDate,
                'brutto' => $brutto
            ];

            $pdf = PDF::loadView('invoices.export', $data);
            return $pdf->download('faktura.pdf');

            //return redirect()->back();
        }
    }
}
