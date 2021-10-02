@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header d-flex">
            Sons
            <div class="ml-auto">
                <a href="{{ route('home') }}">Home</a>|
                <a href="{{ route('sons.index') }}">Sons</a>|
                <a href="{{ route('grandsons.index') }}">Grandsons</a>
            </div>

        </div>
        <a class="btn btn-light" href="{{ route('sons.create') }}">Add Son</a>
        @isset($sons)
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>sons count</th>
                                <th>birth date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sons as $son)
                                <tr>
                                    <td>{{ $son->id }}</td>
                                    <td>{{ $son->name }}</td>
                                    <td>
                                        <a
                                            href="{{ route('grandsons.index', ['son_id' => $son->id]) }}">{{ $son->grandsons->count() }}</a>
                                    </td>
                                    <td>{{ $son->birth_date }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        No Son Found
                                    </td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        @endisset
    </div>

@endsection
