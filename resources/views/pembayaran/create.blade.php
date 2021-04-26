@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content_header')
    <i>Transaksi > Pembayaran</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Pembayaran') }}</div>

                <div class="card-body">
                    @include('flash::message')
                    <a href="{{route('pembayaran.index')}}" class="btn btn-warning mb-2">Kembali</a>
                    <button class="btn btn-primary mb-2" onclick="submitForm();">Simpan</button>
                    
                    <form method="post" name="formAdd" id="formAdd" action="{{ route('pembayaran.store') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nisn" class="col-md-2 col-form-label">Siswa</label>
                            <div class="col-md-5">
                                <select name="siswa_id" class="form-control" id="siswa" required>
                                    <option value="" disabled selected>--Pilih Siswa--</option>
                                    @foreach ($siswa as $sis)
                                        <option value="{{ $sis->id }}">{{ $sis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tanggal" class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-5">
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kelas" class="col-md-2 col-form-label">SPP</label>
                            <div class="col-md-5">
                                <select name="spp_id" class="form-control" id="spp" required>
                                    <option value="" disabled selected>--Pilih SPP--</option>
                                    @foreach ($spp as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->tahun.' - Rp. '.$sp->nominal }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jumlah" class="col-md-2 col-form-label">Jumlah Bayar</label>
                            <div class="col-md-5">
                                <input type="number" name="jumlah_bayar" class="form-control" id="jumlah" required max="13">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript">
    function submitForm() {
        document.getElementById("formAdd").submit();
    }
</script>
@stop