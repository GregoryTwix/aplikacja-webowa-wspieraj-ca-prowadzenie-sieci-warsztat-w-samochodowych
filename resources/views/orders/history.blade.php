@extends('layouts.main')

@section('content')
    <h1>Historia wizyt</h1>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Warsztat</th>
                    <th>Kwota</th>
                    <th>Faktura</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->date}}</td>
                        <td>{{$order->workshop->name}}</td>
                        <td>
                            @if($order->cost > 0)
                                {{$order->cost}} zł
                            @else
                                <span class="badge bg-danger">Oczekiwanie na wycenę</span>
                            @endif
                        </td>
                        <td>
                            @if($order->invoice)
                                <a href="{{route('invoices.show', [$order->workshop_id, $order->invoice->id])}}"><button class="btn btn-success">Pokaż</button></a>
                            @else
                                Brak
                            @endif
                        </td>
                        <td>
                            @if($order->status == 1)
                                <span class="badge bg-primary">Anulowane</span>
                            @elseif($order->status == 2)
                                <span class="badge bg-success">Zrealizowane</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
