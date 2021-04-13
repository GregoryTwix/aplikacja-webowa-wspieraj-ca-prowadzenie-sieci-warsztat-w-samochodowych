@extends('layouts.staff')

@section('content')
    <h1>Lista dostępnych materiałów</h1>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Ilość</th>
                    <th>Typ</th>
                    <th>Akcja</th>
                </tr>
                </thead>
                <tbody>
                @if($items)
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            {{$item->type}}
                        </td>
                        <td>
                            <a href="{{route('warehouse.manageItem', [$workshopId, $item->id])}}"><button class="btn btn-primary">Edytuj</button></a>
                            <a href="{{route('warehouse.deleteItem', [$workshopId, $item->id])}}"><button class="btn btn-danger">Usuń</button></a>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
