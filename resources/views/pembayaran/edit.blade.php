@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <i>Master Data > Kelas</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ubah Kelas') }}</div>

                <div class="card-body">

                    <a href="{{route('siswa.index')}}" class="btn btn-warning mb-2">Kembali</a>
                    <button class="btn btn-primary mb-2" onclick="submitForm();">Simpan</button>
                    
                    <form method="post" name="formEdit" id="formEdit" action="{{ route('siswa.update', ['siswa' => $siswa->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="nisn" class="col-md-2 col-form-label">NISN</label>
                            <div class="col-md-5">
                                <input type="text" name="nisn" class="form-control" id="nisn" max="10" value="{{ $siswa->nisn }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nis" class="col-md-2 col-form-label">NIS</label>
                            <div class="col-md-5">
                                <input type="text" name="nis" class="form-control" id="nis" max="10" value="{{ $siswa->nis }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama" class="col-md-2 col-form-label">Nama Siswa</label>
                            <div class="col-md-5">
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $siswa->name }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kelas" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-5">
                                <select name="kelas" id="kelas" required>
                                    @foreach ($kelas as $kls)
                                        <option value="{{ $kls->id }} {{ $kls->id == $siswa->kelas->id ? 'selected' : ''}}">{{ $kls->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-5">
                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $siswa->alamat }}" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="telp" class="col-md-2 col-form-label">Telp</label>
                            <div class="col-md-5">
                                <input type="text" name="telp" class="form-control" id="telp" value="{{ $siswa->telp }}" required max="13">
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
        document.getElementById("formEdit").submit();
    }
</script>
@stop