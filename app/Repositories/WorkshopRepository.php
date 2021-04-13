<?php

namespace App\Repositories;

use App\Models\Workshop;

class WorkshopRepository {

    public function get() {
        return Workshop::get();
    }

    public function create($workshopRequest) {
        $workshop = new Workshop();
        $workshop->name = $workshopRequest->name;
        $workshop->address = $workshopRequest->address;
        $workshop->save();

        return true;
    }

    public function update($workshopRequest, $id) {
        $workshop = Workshop::find($id);

        if(!$workshop) {
            return false;
        }

        $workshop->name = $workshopRequest->name;
        $workshop->address = $workshopRequest->address;
        $workshop->save();

        return true;
    }
}
