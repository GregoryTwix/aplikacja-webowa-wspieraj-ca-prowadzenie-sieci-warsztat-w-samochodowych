@extends('layouts.main')

@section('content')
    <h1>Lista użytkowników</h1>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Imię</th>
                    <th>Uprawnienia</th>
                    <th>Akcja</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @php
                                $role = \App\Models\Permissions::where('user_id', $user->id)->orderByDesc('permissions_level')->with('role')->first();
                            @endphp
                            {{$role->role->name}}

                        </td>
                        <td>
                            <a href="{{route('users.manage', $user->id)}}"><button class="btn btn-primary">Edytuj</button></a>
                            <a href="{{route('users.delete', $user->id)}}"><button class="btn btn-danger">Usuń</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{route('users.createForm')}}"><button class="btn btn-success">Dodaj pracownika</button></a>
@endsection
