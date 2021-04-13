<?php

namespace App\Repositories;

use App\Models\WarehouseItem;

class WarehouseRepository {

    public function itemsList($workshopId) {
        return WarehouseItem::where('workshop_id', $workshopId)->get();
    }

    public function createItem($request, $workshopId) {
        $item = new WarehouseItem();
        $item->name = $request->name;
        $item->quantity = $request->quantity;

        if($request->comment) {
            $item->comment = $request->comment;
        }
        $item->workshop_id = $workshopId;
        $item->type = $request->type;
        $item->save();

        return true;
    }

    public function findItem($id, $workshopId) {
        return WarehouseItem::where('workshop_id', $workshopId)
            ->where('id', $id)
            ->first();
    }

    public function updateItem($request, $itemId, $workshopId) {
        $item = WarehouseItem::find($itemId);

        if(!$item) {
            return false;
        }

        $item->name = $request->name;
        $item->quantity = $request->quantity;

        if($request->comment) {
            $item->comment = $request->comment;
        }
        $item->workshop_id = $workshopId;
        $item->type = $request->type;
        $item->save();

        return true;
    }

    public function deleteItem($itemId) {
        $item = WarehouseItem::find($itemId);

        if($item) {
            $item->delete();
            return true;
        }


        return false;
    }
}
