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

                    <a href="{{route('kelas.index')}}" class="btn btn-warning mb-2">Kembali</a>
                    <button class="btn btn-primary mb-2" onclick="submitForm();">Simpan</button>
                    
                    <form method="post" name="formEdit" id="formEdit" action="{{ route('kelas.update', ['kela' => $kelas->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="nama_kelas" class="col-md-2 col-form-label">Nama Kelas</label>
                            <div class="col-md-5">
                                <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{ $kelas->nama_kelas }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kompetensi" class="col-md-2 col-form-label">Kompetensi Keahlian</label>
                            <div class="col-md-5">
                                <input type="text" name="kompetensi_keahlian" class="form-control" id="kompetensi" value="{{ $kelas->kompetensi_keahlian }}">
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