@extends('layouts.staff')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('users.clientUpdate', [$workshopId, $user->id])}}">
                        @csrf
                        <div class="form-group">
                            <label>Imię</label>
                            <input class="form-control" name="name" value="{{$user->name}}" disabled>
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
                <div class="col-lg-1"> </div>
                <div class="col-lg-5">

                </div>
            </div>
        </div>
    </div>
@endsection
