<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserManage;
use App\Models\Permissions;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;


class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    //lista użytkowników
    public function usersList() {
        if($this->authorize('manageUsers')) {
            $users = User::with('permissions.role')->get();

            return view('users.table')->with('users', $users);
        }
    }

    //lista klientów widoczna dla pracowników
    public function manageClients($workshopId) {
        $users = User::with('permissions.role')
            ->get();

        return view('users.listForEmployee')
            ->with('users', $users)
            ->with('workshopId', $workshopId);
    }

    //formularz edycji klienta
    public function manageClient($workshopId, $id) {
        $user = User::find($id);
        $roles = Role::get();

        $permissions = Permissions::where('user_id', $id)
            ->with('role')
            ->with('workshop')
            ->get();

        return view('users.staffManage')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('permissions', $permissions)
            ->with('workshopId', $workshopId);
    }

    //aktualizacja danych klienta
    public function updateClient(Request $user, $workshopId, $clientId) {
        $update = $this->repository->updateClient($clientId, $user);

        if($this->authorize('manageUsers')) {
            if ($update) {
                Session::Flash('message', 'Pomyślnie zaktualizowano użytkownika');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }
        }

        return redirect(route('users.manageClients', $workshopId));

    }

    //formularz edycji użytkownika (dowolnego)
    public function manage($id) {
        if($this->authorize('manageUsers')) {
            $user = User::find($id);
            $roles = Role::get();

            $permissions = Permissions::where('user_id', $id)
                ->with('role')
                ->with('workshop')
                ->get();

            return view('users.manage')
                ->with('user', $user)
                ->with('roles', $roles)
                ->with('permissions', $permissions);
        }
    }

    //aktualizacja edycji użytkownika (dowolnego)
    public function update(UserManage $user, $id) {
        $update = $this->repository->update($id, $user);

        if($this->authorize('manageUsers')) {
            if ($update) {
                Session::Flash('message', 'Pomyślnie zaktualizowano użytkownika');
            } else {
                Session::Flash('error', 'Wystąpił błąd');
            }
        }

        return redirect(route('users.list'));

    }

    //usuwanie użytkownika
    public function delete($id) {
        $user = User::find($id);
        if($this->authorize('manageUsers')){
            if ($user) {
                $user->delete();
                Session::Flash('message','Pomyślnie usunięto użytkownika');
            } else {
                Session::Flash('error', 'Użytkownik nie istnieje');
            }
        }

        return redirect(route('users.list'));
    }

    public function createUserForm() {
        if($this->authorize('manageUsers')) {
            $roles = Role::get();

            return view('users.create')
                ->with('roles', $roles);
        }
    }

    public function createUser(Request $request) {
        if($this->authorize('manageUsers')) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'discount_counter' => 0
            ]);

            $permissions = new Permissions();
            $permissions->user_id = $user->id;


            $permissions->permissions_level = $request->role_id;
            $permissions->workshop_id = $request->workshop;
            $permissions->save();

            return redirect(route('users.list'));
        }
    }

    public function stats ($id) {
        if($this->authorize('raport', $id)) {
            $users = User::groupBy('date')
                ->orderBy('date', 'desc')
                ->take(6)
                ->get([
                    DB::raw('MONTH(created_at) as date'),
                    DB::raw('count(id) as total')
                ])
                ->pluck('total', 'date');

            $months = array("", "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");

            $monthNames = [];
            foreach($users as $month => $count) {
                $monthNames[] = $months[$month];
            }

            return view('workshops.usersStats')
                ->with('workshopId', $id)
                ->with('users', $users)
                ->with('monthNames', $monthNames);
        }
    }
}
