@extends('layouts.staff')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('delivers.create', $workshopId)}}">
                        @csrf
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input class="form-control" name="name" placeholder="nazwa dostawcy">
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input class="form-control" name="nip" type="number" placeholder="NIP">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <input class="form-control" name="address" placeholder="Adres">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Dodaj dostawcę</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
