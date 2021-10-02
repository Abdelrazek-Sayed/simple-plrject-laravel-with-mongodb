@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header d-flex">
            Add GrandSon
            <div class="ml-auto">
                <a href="{{ route('home') }}">Home</a>|
                <a href="{{ route('sons.index') }}">Sons</a>|
                <a href="{{ route('grandsons.index') }}">Grandsons</a>
            </div>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('grandsons.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="son_id">Father</label>
                    <select name="son_id" class="form-control">
                        <option value="">Select Father</option>
                        @forelse ($sons as $son)
                            <option value="{{ $son->id }}" {{ old('son_id') == $son->id ? 'selected' : null}}>{{ $son->name }}</option>
                        @empty

                        @endforelse
                    </select>
                    @error('son_id')
                        <span class="text-primary">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-primary">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_date">birth date</label>
                    <input type="text" name="birth_date" class="form-control" value="{{ old('birth_date') }}"
                        placeholder="2000-01-05">
                    @error('birth_date')
                        <span class="text-success">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-warning">Add</button>
                </div>
            </form>

        </div>
    </div>

@endsection
