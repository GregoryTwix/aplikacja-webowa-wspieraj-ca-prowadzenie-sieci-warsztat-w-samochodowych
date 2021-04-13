@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
            <form method="post" action="{{route('orders.post')}}">
                @csrf
                <div class="form-group">
                    <label>Wybierz termin</label>
                    <div id="datetimepicker1">
                        <input name="date" data-format="dd/MM/yyyy hh:mm:ss" type="datetime-local" class="form-control"></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                </div>
                <div class="form-group">
                    <select class="form-control" name="workshop_id">
                        <option> --- Wybierz warsztat --- </option>
                        @foreach($workshops as $workshop)
                            <option value="{{$workshop->id}}">{{$workshop->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Opis</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Zamów wizytę</button>
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
                                    <li><b>{{$workshop->name}}</b> ({{$workshop->address}})</li>
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
