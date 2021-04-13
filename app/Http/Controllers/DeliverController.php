<?php

namespace App\Http\Controllers;

use App\Http\Requests\Deliver;
use App\Repositories\DeliverRepository;
use Illuminate\Http\Request;
use Session;


class DeliverController extends Controller
{
    private $repository;

    public function __construct(DeliverRepository $repository)
    {
        $this->repository = $repository;
    }

    //lista dostawców
    public function deliversList($workshopId) {
        if($this->authorize('delivers', $workshopId)) {
            $delivers = $this->repository->getDelivers($workshopId);

            return view('delivers.table')
                ->with('workshopId', $workshopId)
                ->with('delivers', $delivers);
        }
    }

    //formularz dodawania dostawcy
    public function createForm($workshopId) {
        if($this->authorize('delivers', $workshopId)) {
            return view('delivers.create')
                ->with('workshopId', $workshopId);
        }
    }

    //tworzenie dostawcy
    public function create ($workshopId, Deliver $request) {
        if($this->authorize('delivers', $workshopId)) {
            $create = $this->repository->create($request, $workshopId);

            if ($create) {
                Session::Flash('message', 'Pomyślnie dodano pozycję');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }

            return redirect(route('delivers.list', $workshopId));
        }
    }

    //formularz edycji dostawcy
    public function manage($workshopId, $itemId) {
        if($this->authorize('delivers', $workshopId)) {
            $deliver = $this->repository->findDeliver($itemId);

            return view('delivers.manage')
                ->with('workshopId', $workshopId)
                ->with('deliver', $deliver);
        }
    }

    //aktualizacja danych dostawcy
    public function update ($workshopId, $deliverId, Deliver $request) {
        if($this->authorize('delivers', $workshopId)) {
            $create = $this->repository->update($request, $workshopId, $deliverId);

            if ($create) {
                Session::Flash('message', 'Pomyślnie zaktualizowano');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }

            return redirect(route('delivers.list', $workshopId));
        }
    }

    //usuwanie dostawcy
    public function delete($workshopId, $deliverId) {
        if($this->authorize('delivers', $workshopId)) {
            $delete = $this->repository->delete($deliverId);

            if ($delete) {
                Session::Flash('message', 'Pomyślnie usunięto pozycję');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }

            return redirect(route('delivers.list', $workshopId));
        }
    }
}
