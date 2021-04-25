@extends('adminlte::page')

@section('title', 'SPP > Edit')

@section('content_header')
    <i>Master Data > SPP</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ubah SPP') }}</div>

                <div class="card-body">

                    <a href="{{route('spp.index')}}" class="btn btn-warning mb-2">Kembali</a>
                    <button class="btn btn-primary mb-2" onclick="submitForm();">Simpan</button>
                    
                    <form method="post" name="formEdit" id="formEdit" action="{{ route('spp.update', ['spp' => $spp->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="tahun" class="col-md-2 col-form-label">Tahun</label>
                            <div class="col-md-5">
                                <select class="form-control" name="tahun" id="tahun" aria-label="Default select example">
                                    @for ($i = date('Y'); $i > date('Y') - 15; $i--)
                                        <option value="{{ $i }}" {{ $spp->tahun == $i ? 'selected' : '' }}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nominal" class="col-md-2 col-form-label">Nominal</label>
                            <div class="col-md-5">
                                <input type="text" name="nominal" class="form-control" id="nominal" value="{{ $spp->nominal }}">
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