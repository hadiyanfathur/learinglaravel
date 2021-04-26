@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content_header')
    <i>Transaksi > Pembayaran</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pembayaran') }}</div>

                <div class="card-body">
                    @include('flash::message')
                    <a href="{{route('pembayaran.create')}}" class="btn btn-primary mb-2">Tambah Pembayaran</a>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nilai SPP</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Nama Petugas</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $pembayaran as $bayar )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $bayar->siswa->nisn }}</td>
                                        <td>{{ $bayar->siswa->nama }}</td>
                                        <td>{{ $bayar->tanggal }}</td>
                                        <td>{{ $bayar->spp->nominal }}</td>
                                        <td>{{ $bayar->jumlah_bayar }}</td>
                                        <td>{{ $bayar->user->name }}</td>
                                        <td>
                                            {{-- <form method="POST" action="{{ route('pembayaran.destroy', ['pembayaran' => $bayar->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                            <a class="btn btn-warning" href="{{ route('pembayaran.update', ['pembayaran' => $bayar->id]) }}"><i class="fas fa-edit fa-md"></i></a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash fa-md"></i></button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pembayaran->links() }}
                </div>
            </div>
        </div>
    </div>
@stop