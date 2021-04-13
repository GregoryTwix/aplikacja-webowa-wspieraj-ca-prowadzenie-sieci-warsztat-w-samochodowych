@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <form method="post" action="{{route('users.update', $user->id)}}">
                        @csrf
                        <div class="form-group">
                            <label>Imię</label>
                            <input class="form-control" name="name" value="{{$user->name}}">
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
                <div class="col-lg-1"> </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Warsztat</th>
                                    <th>Uprawnienia</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->workshop->name}}</td>
                                    <td>{{$permission->role->name}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
