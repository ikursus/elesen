@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Halaman Senarai Licenses</div>

<div class="card-body">

    <p>
        <a href="<?php echo route('licenses.create'); ?>" class="btn btn-primary">
        Tambah Licenses Baru
        </a>
    </p>

    @include('layouts.alerts')

    @if ( count( $senarai_licenses ) )

    {!! Form::open(['route' => 'licenses.update.selected']) !!}
    @method('patch')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>TARIKH MULA</th>
                <th>TARIKH TAMAT</th>
                <th>PROVIDER</th>
                <th>REMARKS</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $senarai_licenses as $item )

            <tr>
                <td>{!! Form::checkbox('id[]', $item->id) !!}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category->nama }}</td>
                <td>{{ $item->tarikh_mula }}</td>
                <td>{{ $item->tarikh_tamat }}</td>
                <td>{{ $item->provider }}</td>
                <td>{{ $item->remarks }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('licenses.edit', ['id' => $item->id ]) }}">EDIT</a>

                    

                </td>
            </tr>

            @endforeach

        </tbody>


    </table>
    {!! Form::select('status', ['AKTIF' => 'AKTIF', 'BATAL' => 'BATAL']) !!}
    <button type="submit">KEMASKINI</button>

    {!! Form::close() !!}

    @endif

</div>
</div>
</div>
</div>
</div>
@endsection
