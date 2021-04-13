@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('workshops.changeVisitDate', [$order->workshop_id, $order->id])}}">
                        @csrf
                        <div class="form-group">
                            <label>Nowy termin</label>
                            <input class="form-control" type="datetime-local" name="date" placeholder="data" value="{{$order->date}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Aktualizuj</button>
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
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-text-width"></i>

                            <h3 class="box-title">Lista warsztatów</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ol>
                                @foreach($workshops as $workshop)
                                    <li>{{$workshop->name}}</li>
                                @endforeach
                            </ol>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
