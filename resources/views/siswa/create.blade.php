@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <i>Master Data > Siswa</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Siswa') }}</div>

                <div class="card-body">

                    <a href="{{route('siswa.index')}}" class="btn btn-warning mb-2">Kembali</a>
                    <button class="btn btn-primary mb-2" onclick="submitForm();">Simpan</button>
                    
                    <form method="post" name="formAdd" id="formAdd" action="{{ route('siswa.store') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nisn" class="col-md-2 col-form-label">NISN</label>
                            <div class="col-md-5">
                                <input type="text" name="nisn" class="form-control" id="nisn" max="10" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nis" class="col-md-2 col-form-label">NIS</label>
                            <div class="col-md-5">
                                <input type="text" name="nis" class="form-control" id="nis" max="10" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama" class="col-md-2 col-form-label">Nama Siswa</label>
                            <div class="col-md-5">
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kelas" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-5">
                                <select name="kelas_id" class="form-control" id="kelas" required>
                                    <option value="" disabled selected>--Pilih Kelas--</option>
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-5">
                                <input type="text" name="alamat" class="form-control" id="alamat" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="telp" class="col-md-2 col-form-label">Telp</label>
                            <div class="col-md-5">
                                <input type="text" name="telp" class="form-control" id="telp" required max="13">
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