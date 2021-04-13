<?php

namespace App\Repositories;

use App\Models\Deliver;
use App\Models\Permissions;
use App\Models\User;
use App\Models\Workshop;

class DeliverRepository {

    public function getDelivers($workshopId) {
        return Deliver::where('workshop_id', $workshopId)->get();
    }

    public function create ($request, $workshopId) {
        $deliver = new Deliver();
        $deliver->workshop_id = $workshopId;
        $deliver->name = $request->name;
        $deliver->nip = $request->nip;
        $deliver->address = $request->address;

        $deliver->save();

        return true;
    }

    public function update ($request, $workshopId, $deliverId) {
        $deliver = Deliver::find($deliverId);

        if(!$deliver) {
            return false;
        }

        $deliver->workshop_id = $workshopId;
        $deliver->name = $request->name;
        $deliver->nip = $request->nip;
        $deliver->address = $request->address;

        $deliver->save();

        return true;
    }

    public function delete($deliverId) {
        $deliver = Deliver::find($deliverId);

        if(!$deliver) {
            return false;
        }

        $deliver->delete();
        return true;
    }

    public function findDeliver($deliverId) {
        $deliver = Deliver::find($deliverId);

        if(!$deliver) {
            return false;
        }

        return $deliver;
    }
}
