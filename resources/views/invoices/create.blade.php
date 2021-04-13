@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    @if($order->user->discount_counter == 10)
                        <div class="alert alert-primary" role="alert">
                            Klient posiada 10 punktów, przysługuje mu 10% rabatu
                        </div>
                        @endif
                    <form method="post" action="{{route('invoices.create', [$workshopId, $orderId])}}">
                        @csrf
                        <div class="form-group">
                            <label>Nazwa usługi</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Komentarz</label>
                            <textarea name="comment" class="form-control"></textarea>
                        </div>
                        @if($order->user->discount_counter == 10)
                            <div class="form-group">
                                Uwzględnij zniżkę <input type="checkbox" name="discount">
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Wystaw fakturę</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-2"> </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
@endsection
