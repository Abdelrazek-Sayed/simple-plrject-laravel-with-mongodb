@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header d-flex">
            {{ __('Posts ') }}
            <div class="ml-auto">
                <form action="{{ route('posts.index') }}" method="GET">
                    @csrf
                    
                    <div class="input-group">
                        <div class="form-outline">
                            {{-- <label class="form-label" for="form1">Search</label> --}}
                            <input type="text" name="q" value="{{ old('q', request()->input('q')) }}"
                                class="form-control" placeholder="Search" />
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>body</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    No Posts Found
                                </td>
                            </tr>
                        @endforelse
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {{ $posts->appends(request()->all())->links() }}
                            </td>
                        </tr>
                    </tfoot>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
