@extends('layouts.staff')

@section('content')
    <h1>Kalendarz wizyt</h1>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Opis</th>
                    <th>Kwota</th>
                    <th>Status</th>
                    <th>Faktura</th>
                    <th class="text-center">Zmień status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->date}}</td>
                        <td>{{$order->description}}</td>
                        <td>
                            @if($order->cost > 0)
                                {{$order->cost}} zł
                            @else
                                <a href="{{route('workshops.changeVisitCostForm', [$workshopId, $order->id])}}"><button class="btn btn-danger">Wyceń</button></a>
                            @endif
                        </td>
                        <td>
                            @if($order->status == 0)
                                <span class="badge bg-danger">Czeka na akceptację</span>
                            @elseif($order->status == 1)
                                <span class="badge bg-primary">Czeka na akceptację klienta</span>
                            @elseif($order->status == 2)
                                <span class="badge bg-success">Zrealizowane</span>
                            @elseif($order->status == 3)
                                <span class="badge bg-default">Przyjęte do realizacji</span>
                            @endif
                        </td>
                        <td>

                            @if($order->invoice)
                                <a href="{{route('invoices.show', [$workshopId, $order->invoice->id])}}"><button class="btn btn-success">Pokaż</button></a>
                            @else
                                <a href="{{route('invoices.createForm', [$workshopId, $order->id])}}"><button class="btn btn-dark">Wystaw</button></a>
                            @endif
                        </td>
                        <td class="text-center">
                            @can('calendarApprove', $workshopId)
                            <a href="{{route('workshops.changeVisitStatus', [$workshopId, $order->id, 2])}}"><button class="btn btn-success">Zrealizowane</button></a>
                            <a href="{{route('workshops.changeVisitDateForm', [$workshopId, $order->id])}}"><button class="btn btn-danger">Zmień termin</button></a>
                            <a href="{{route('workshops.changeVisitStatus', [$workshopId, $order->id, 3])}}"><button class="btn btn-default">Przyjęte</button></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{$orders->links()}}
            </table>
        </div>
    </div>
@endsection
