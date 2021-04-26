@extends('layouts.adminlte')

@section('title', 'SPP')

@section('content_header')
    <i>Master Data > SPP</i>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Data SPP') }}</div>

                <div class="card-body">
                    @include('flash::message')
                    <a href="{{route('spp.create')}}" class="btn btn-primary mb-2">Tambah SPP</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $spp as $item )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->nominal }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('spp.destroy', ['spp' => $item->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                            <a class="btn btn-warning" href="{{ route('spp.update', ['spp' => $item->id]) }}"><i class="fas fa-edit fa-md"></i></a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash fa-md"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $spp->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
