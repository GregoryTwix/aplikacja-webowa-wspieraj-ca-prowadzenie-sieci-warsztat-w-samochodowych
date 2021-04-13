<?php

namespace App\Http\Controllers\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderCreate;
use App\Models\Order;
use App\Models\User;
use App\Repositories\OrderRepository;
use App\Repositories\WorkshopRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller {

    private $repository;
    private $workshopRepository;

    public function __construct(OrderRepository $repository, WorkshopRepository $workshopRepository)
    {
        $this->repository = $repository;
        $this->workshopRepository = $workshopRepository;
    }

    //formularz do tworzenia zamówienia
    public function makeForm() {
        $workshops = $this->workshopRepository->get();

        return view('orders.create')->with('workshops', $workshops);
    }

    //dodawanie zamówienia
    public function make(OrderCreate $request) {
        $result = $this->repository->makeOrder($request->date, $request->workshop_id, $request->description);

        if (!$result) {
            Session::Flash('error', 'Wystąpił błąd');
        } else {
            Session::Flash('message', 'Dodano wizytę');
        }

        return redirect(route('orders.myOrders'));
    }

    //aktualne wizyty uzytkownika
    public function userVisits() {
        if($this->authorize('userVisits')) {
            $orders = $this->repository->getCurrentByUserIdWithData(Auth::user()->id);

            return view('orders.table')->with('orders', $orders);
        }
    }

    //historia wizyt użytkownika
    public function userVisitsHistory() {
        if($this->authorize('userVisits')) {
            $orders = $this->repository->getHistoryByUserIdWithData(Auth::user()->id);

            return view('orders.history')->with('orders', $orders);
        }
    }

    //zmiana statusu wizyty
    public function changeVisitStatus($workshopId, $id, $status) {
        if($this->authorize('calendar', $workshopId)) {
            $order = $this->repository->findById($id);

            if (!$order) {
                Session::Flash('error', 'Nie ma takiego zamówienia');
            } else {
                Session::Flash('message', 'Zmieniono status');
            }

            $user = User::find($order->client_id);

            if($status == 2) {
                $to_name = $user->name;
                $to_email = $user->email;

                try {
                    Mail::send([], [], function ($message) use ($to_name, $to_email, $order) {
                        $message->to($to_email, $to_name)
                            ->subject("Wizyta zaakceptowana")
                            ->setBody('Zamówienie '.$order->id.' zostało zrealizowane! Zapraszamy po odbiór na '.$order->workshop->address.'');
                        $message->from("marcin.grabkowski@o2.pl", "Warsztat");
                    });
                }   catch(Exception $e) {
                    Session::Flash('error', 'Nie udało się wysłać maila do klienta. Sprawdź konfigurację poczty w pliku env');
                }
            }

            $status = $this->repository->setStatus($id, $status);

            return redirect()->back();
        }
    }

    public function changeVisitDateForm($workshopId, $id) {
        if($this->authorize('calendar', $workshopId)) {
            $order = $this->repository->findById($id);

            return view('workshops.changeVisitDate')
                ->with('order', $order);
        }
    }

    public function changeVisitDate($workshopId, $id, Request $request) {
        if($this->authorize('calendar', $workshopId)) {
            $update = $this->repository->changeDate($id, $request->date);

            if (!$update) {
                Session::Flash('error', 'Nie ma takiego zamówienia');
            } else {
                Session::Flash('message', 'Zmieniono datę');
            }


            return redirect()->back();
        }
    }

    public function acceptByUser($orderId) {
        if($this->authorize('userVisits')) {
            $order = Order::find($orderId);
            $order->is_accept_from_client = 1;
            $order->status = 3;
            $order->save();

            return redirect()->back();
        }
    }

    public function changeVisitCostForm($workshopId, $id) {
        if($this->authorize('calendar', $workshopId)) {
            $order = $this->repository->findById($id);

            return view('workshops.changeVisitCostForm')
                ->with('order', $order);
        }
    }

    public function changeVisitCost($workshopId, $id, Request $request) {
        if($this->authorize('calendar', $workshopId)) {
            $update = $this->repository->changeCost($id, $request->cost);

            if (!$update) {
                Session::Flash('error', 'Nie ma takiego zamówienia');
            } else {
                Session::Flash('message', 'Zmieniono datę');
            }


            return redirect()->back();
        }
    }
}
