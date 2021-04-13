@extends('layouts.main')

@section('content')
    <h1>Moje wizyty</h1>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Warsztat</th>
                    <th>Kwota</th>
                    <th>Zniżka</th>
                    <th>Faktura</th>
                    <th>Status</th>
                    <th>Akcja</th>
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
                        @if($order->is_discount)
                            <span class="badge bg-danger">Przyznana</span>
                        @else
                            <span class="badge bg-primary">Brak</span>
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
                        @if($order->status == 0)
                            <span class="badge bg-danger">Czeka na akceptację</span>
                        @elseif($order->status == 1)
                            @if(!$order->is_accept_from_client)
                                <label>{{$order->date}}</label><br />
                                <a href="{{route('orders.acceptByUser', $order->id)}}"><button class="btn btn-success">Zaakceptuj termin</button></a>
                            @else
                                <span class="badge bg-primary">Anulowane</span>
                            @endif
                        @elseif($order->status == 2)
                            <span class="badge bg-success">Zrealizowane</span>

                        @elseif($order->status == 3)
                             <span class="badge bg-default">Przyjęte do realizacji</span>
                        @endif
                    </td>
                    <td>
                        @if($order->status == 0)
                            <button class="btn btn-danger">Anuluj</button>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
