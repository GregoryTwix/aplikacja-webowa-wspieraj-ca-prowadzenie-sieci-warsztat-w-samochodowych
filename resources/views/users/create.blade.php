@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('users.create')}}">
                        @csrf
                        <div class="form-group">
                            <label>Imię i nazwisko</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Hasło</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role_id">
                                <option> --- Poziom uprawnień --- </option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="workshop">
                                <option> --- Warsztat --- </option>
                                @foreach($workshops as $workshop)
                                    <option value="{{$workshop->id}}">{{$workshop->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Dodaj użytkownika</button>
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
