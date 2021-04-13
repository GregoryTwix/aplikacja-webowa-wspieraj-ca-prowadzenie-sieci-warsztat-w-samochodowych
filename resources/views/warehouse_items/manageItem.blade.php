@extends('layouts.staff')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('warehouse.updateItem', [$workshopId, $item->id])}}">
                        @csrf
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input class="form-control" name="name" placeholder="nazwa pozycji" value="{{$item->name}}">
                        </div>
                        <div class="form-group">
                            <label>Ilość</label>
                            <input class="form-control" name="quantity" placeholder="Ilość" value="{{$item->quantity}}">
                        </div>
                        <div class="form-group">
                            <label>Typ</label>
                            <input class="form-control" name="type" placeholder="Type" value="{{$item->type}}">
                        </div>
                        <div class="form-group">
                            <label>Komentarz</label>
                            <textarea name="comment" class="form-control">{{$item->comment}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Aktualizuj pozycję</button>
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
