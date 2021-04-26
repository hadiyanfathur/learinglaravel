@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Selamat datang, ') . Auth::user()->nama}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop