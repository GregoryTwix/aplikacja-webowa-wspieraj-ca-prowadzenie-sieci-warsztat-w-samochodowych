<?php

namespace App\Repositories;

use App\Models\Permissions;
use App\Models\User;
use App\Models\Workshop;

class UserRepository {

    public function update($id, $request) {
        $user = User::find($id);

        if(!$user) {
            return false;
        }

        $user->name = $request->name;

        $permissions = Permissions::where('user_id', $id)->where('workshop_id', $request->workshop)->first();

        if(!$permissions) {
            $permissions = new Permissions();
            $permissions->user_id = $id;
        }

        $permissions->permissions_level = $request->role_id;
        $permissions->workshop_id = $request->workshop;
        $permissions->save();

        return true;
    }

    public function updateClient($id, $request)
    {
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        $user->name = $request->name;
        $user->save();
    }
}
