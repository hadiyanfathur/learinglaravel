@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <i>Master Data > Siswa</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data Siswa') }}</div>

                <div class="card-body">

                    <a href="{{route('siswa.create')}}" class="btn btn-primary mb-2">Tambah Siswa</a>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $siswa as $sis )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $sis->nisn }}</td>
                                        <td>{{ $sis->nis }}</td>
                                        <td>{{ $sis->nama }}</td>
                                        <td>{{ $sis->kelas->nama_kelas }}</td>
                                        <td>{{ $sis->alamat }}</td>
                                        <td>{{ $sis->telp }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('siswa.destroy', ['siswa' => $sis->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                            <a class="btn btn-warning" href="{{ route('siswa.update', ['siswa' => $sis->id]) }}"><i class="fas fa-edit fa-md"></i></a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash fa-md"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
@stop