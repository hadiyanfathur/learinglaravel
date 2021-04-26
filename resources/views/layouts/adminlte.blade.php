@extends('adminlte::page')

@section('js')
<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(2500).fadeOut(1000);
</script>
@stop