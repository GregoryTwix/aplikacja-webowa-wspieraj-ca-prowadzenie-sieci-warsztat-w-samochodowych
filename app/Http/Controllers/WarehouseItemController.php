<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseItem;
use App\Repositories\UserRepository;
use App\Repositories\WarehouseRepository;
use Illuminate\Http\Request;
use Session;


class WarehouseItemController extends Controller
{
    private $repository;

    public function __construct(WarehouseRepository $repository)
    {
        $this->repository = $repository;
    }

    //formularz dodawania pozycji do magazynu
    public function createItemForm($workshopId) {
        if($this->authorize('warehouse', $workshopId)) {

            return view('warehouse_items.createItem')
                ->with('workshopId', $workshopId);
        }
    }

    //zarządzanie przedmiotem w magazynie
    public function manageItem($workshopId, $itemId) {
        if($this->authorize('warehouse', $workshopId)) {
            $item = $this->repository->findItem($itemId, $workshopId);

            return view('warehouse_items.manageItem')
                ->with('workshopId', $workshopId)
                ->with('item', $item);
        }
    }

    //aktualizacja pozycji w magazynie
    public function updateItem($workshopId, $itemId,  WarehouseItem $request) {
        if($this->authorize('warehouse', $workshopId)) {
            $update = $this->repository->updateItem($request, $itemId, $workshopId);

            if ($update) {
                Session::Flash('message', 'Pomyślnie dodano pozycję');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }

            return redirect(route('warehouse.itemsList', $workshopId));
        }
    }

    //usuwanie pozycji z magazynu
    public function deleteItem($workshopId, $itemId) {
        if($this->authorize('warehouse', $workshopId)) {
            $delete = $this->repository->deleteItem($itemId);

            if ($delete) {
                Session::Flash('message', 'Pomyślnie usunięto pozycję');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }

            return redirect(route('warehouse.itemsList', $workshopId));
        }
    }

    //tworzenie pozycji w magazynie
    public function createItem ($workshopId, WarehouseItem $request) {
        if($this->authorize('warehouse', $workshopId)) {
            $create = $this->repository->createItem($request, $workshopId);

            if ($create) {
                Session::Flash('message', 'Pomyślnie dodano pozycję');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }

            return redirect(route('warehouse.itemsList', $workshopId));
        }
    }

    //lista pozycji danego magazynu
    public function itemsList($workshopId) {
        if($this->authorize('warehouse', $workshopId)) {
            $items = $this->repository->itemsList($workshopId);

            return view('warehouse_items.table')
                ->with('items', $items)
                ->with('workshopId', $workshopId);
        }
    }
}
