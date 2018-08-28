@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Halaman Senarai Users</div>

<div class="card-body">

    @include('layouts.alerts')

    @if ( count( $senarai_users ) )

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $senarai_users as $item )

            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('users.edit', ['id' => $item['id'] ]) }}">EDIT</a>
                </td>
            </tr>

            @endforeach

        </tbody>


    </table>

    @endif

    <a href="<?php echo route('users.create'); ?>" class="btn btn-primary">
        Tambah User Baru
    </a>

</div>
</div>
</div>
</div>
</div>
@endsection
