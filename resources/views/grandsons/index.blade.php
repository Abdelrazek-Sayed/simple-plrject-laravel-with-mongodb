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
        <a class="btn btn-light" href="{{ route('grandsons.create') }}">Add GrandSon</a>
        @isset($grandsons)

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
                                <th>father name</th>
                                <th>birth date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($grandsons as $grandson)
                                <tr>
                                    <td>{{ $grandson->id }}</td>
                                    <td>{{ $grandson->name }}</td>
                                    <td>{{ $grandson->son->name }}</td>
                                    <td>{{ $grandson->birth_date }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('grandsons.edit', $grandson->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('grandsons.destroy', $grandson->id) }}" method="POST">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        No grandson Found
                                    </td>
                                </tr>
                            @endforelse
                            {{-- <tfoot>
                        <tr>
                            <td colspan="6">
                                {{ $grandsons->links() }}
                            </td>
                        </tr>
                    </tfoot> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endisset

@endsection
