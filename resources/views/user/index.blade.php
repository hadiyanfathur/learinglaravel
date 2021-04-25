@extends('adminlte::page')

@section('title', 'Petugas')

@section('content_header')
    <i>Master Data > Petugas</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Petugas') }}</div>

                <div class="card-body">

                    <a href="{{route('register')}}" class="btn btn-primary mb-2">Tambah Petugas</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $user as $item )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->level == 0 ? 'Administrator' : 'Petugas' }}</td>
                                        <td>
                                            @if ($item->level == 1)
                                                <form method="POST" action="{{ route('petugas.destroy', ['petuga' => $item->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash fa-md"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $user->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
