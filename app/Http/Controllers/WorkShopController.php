<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workshop;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Models\Workshop as WorkshopModel;
use App\Repositories\InvoiceRepository;
use App\Repositories\OrderRepository;
use App\Repositories\WorkshopRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class WorkShopController extends Controller
{

    private $repository;
    private $ordersRepository;
    private $invoiceRepository;

    public function __construct(WorkshopRepository $repository, OrderRepository $orderRepository, InvoiceRepository $invoiceRepository)
    {
        $this->repository = $repository;
        $this->ordersRepository = $orderRepository;
        $this->invoiceRepository = $invoiceRepository;
    }

    //formularz dodawania instancji warsztatu
    public function createForm() {
        if($this->authorize('owner')) {
            return view('workshops.create');
        }
    }

    //tworzenie instacji warsztatu
    public function create(Workshop $workshop) {

        if($this->authorize('owner')) {
        $create = $this->repository->create($workshop);

            if ($create) {
                Session::Flash('message', 'Pomyślnie dodano warsztat');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }
        }

        return redirect()->back();
    }

    //aktualizacja instancji warsztatu
    public function update(Workshop $workshop, $id) {

        $create = $this->repository->update($workshop, $id);

        if($this->authorize('owner')) {
            if ($create) {
                Session::Flash('message', 'Pomyślnie zaktualizowano 24warsztat');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }
        }

        return redirect()->back();
    }

    //formularz edycji warsztatu
    public function edit($id) {
        if($this->authorize('owner')) {
            $workshop = WorkshopModel::find($id);

            if (!$workshop) {
                Session::Flash('error', 'Nie ma takiego warsztatu');
            }
        }
        return view('workshops.edit')
            ->with('workshop', $workshop)
            ->with('workshopId', $id);
    }

    //główny widok zarządzania warsztatem
    public function manage($id) {
        if($this->authorize('workshop', $id)) {
            return view('layouts.staff')
                ->with('workshopId', $id);
        }
    }

    //kalendarz wizyt w warsztacie
    public function calendar($id) {
        if($this->authorize('calendar', $id)) {
            $orders = $this->ordersRepository->getWorkshopCurrentData($id);

            return view('workshops.calendar')
                ->with('orders', $orders)
                ->with('workshopId', $id);
        }
    }

    //statystyki warsztatu
    public function stats ($id) {
        if($this->authorize('raport', $id)) {

            $months = array("", "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");

            $lastMonth['dateStart'] = Carbon::now()->subMonth()->startOfMonth();
            $lastMonth['dateEnd'] = Carbon::now()->subMonth()->endOfMonth();
            $lastMonth['month'] = $months[Carbon::now()->subMonth()->month];
            $currentMonth['dateStart'] = Carbon::now()->startOfMonth();
            $currentMonth['dateEnd'] = Carbon::now();

            $stats = Order::groupBy('date')
                ->orderBy('id', 'asc')
                ->take(4)
                ->get([
                    DB::raw('WEEK(date) as date'),
                    DB::raw('count(id) as total')
                ])
                ->pluck('total', 'date');



            $lastMonth['invoices'] = $this->invoiceRepository->filter($lastMonth['dateStart'], $lastMonth['dateEnd']);
            $lastMonth['invoices_netto'] = $this->invoiceRepository->invoicesNettoByDatefilter($lastMonth['dateStart'], $lastMonth['dateEnd']);
            $lastMonth['orders'] = $this->ordersRepository->filter($lastMonth['dateStart'], $lastMonth['dateEnd']);



            $currentMonth['month'] = $months[Carbon::now()->month];
            $currentMonth['invoices'] = $this->invoiceRepository->filter($currentMonth['dateStart'], $currentMonth['dateEnd']);
            $currentMonth['invoices_netto'] = $this->invoiceRepository->invoicesNettoByDatefilter($currentMonth['dateStart'], $currentMonth['dateEnd']);
            $currentMonth['orders'] = $this->ordersRepository->filter($currentMonth['dateStart'], $currentMonth['dateEnd']);


            return view('workshops.stats', [
                'lastMonth' => $lastMonth,
                'currentMonth' => $currentMonth,
                'workshopId' => $id,
                'stats' => $stats
            ]);
        }
    }
}
