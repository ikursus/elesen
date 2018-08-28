@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Halaman Senarai Kategori</div>

<div class="card-body">

    @if ( count( $senarai_categories ) )

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>KOD</th>
                <th>NAMA</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $senarai_categories as $item )

            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['kod'] }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('categories.edit', ['id' => $item['id'] ]) }}">EDIT</a>
                </td>
            </tr>

            @endforeach

        </tbody>


    </table>

    @endif

    <a href="<?php echo route('categories.create'); ?>" class="btn btn-primary">
        Tambah Kategori Baru
    </a>

</div>
</div>
</div>
</div>
</div>
@endsection
