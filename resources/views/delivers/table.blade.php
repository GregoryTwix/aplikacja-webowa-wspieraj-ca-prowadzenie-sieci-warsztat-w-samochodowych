@extends('layouts.staff')

@section('content')
    <h1>Lista dostawców</h1>
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>NIP</th>
                    <th>Adres</th>
                </tr>
                </thead>
                <tbody>
                @if($delivers)
                    @foreach($delivers as $deliver)
                        <tr>
                            <td>{{$deliver->name}}</td>
                            <td>{{$deliver->nip}}</td>
                            <td>
                                {{$deliver->address}}
                            </td>
                            <td>
                                <a href="{{route('delivers.manage', [$workshopId, $deliver->id])}}"><button class="btn btn-primary">Edytuj</button></a>
                                <a href="{{route('delivers.delete', [$workshopId, $deliver->id])}}"><button class="btn btn-danger">Usuń</button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
