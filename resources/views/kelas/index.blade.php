@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content_header')
    <i>Master Data > Kelas</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Kelas') }}</div>

                <div class="card-body">
                    @include('flash::message')
                    <a href="{{route('kelas.create')}}" class="btn btn-primary mb-2">Tambah Kelas</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Kopetensi</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $kelas as $kls )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $kls->nama_kelas }}</td>
                                        <td>{{ $kls->kompetensi_keahlian }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('kelas.destroy', ['kela' => $kls->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                            <a class="btn btn-warning" href="{{ route('kelas.update', ['kela' => $kls->id]) }}"><i class="fas fa-edit fa-md"></i></a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash fa-md"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $kelas->links() }}
                </div>
            </div>
        </div>
    </div>
@stop