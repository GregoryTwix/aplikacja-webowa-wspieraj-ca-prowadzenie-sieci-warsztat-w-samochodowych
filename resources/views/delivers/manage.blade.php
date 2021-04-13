@extends('layouts.staff')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('delivers.update', [$workshopId, $deliver->id])}}">
                        @csrf
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input class="form-control" name="name" placeholder="nazwa dostawcy" value="{{$deliver->name}}">
                        </div>
                        <div class="form-group">
                            <label>NIP</label>
                            <input class="form-control" name="nip" type="number" placeholder="NIP" value="{{$deliver->nip}}">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <input class="form-control" name="address" placeholder="Adres" value="{{$deliver->address}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Zaktualizuj</button>
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
