@extends('layouts.app')

@section('css')
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Halaman Senarai Users</div>

<div class="card-body">

<p>
    <a href="<?php echo route('users.create'); ?>" class="btn btn-primary">
        Tambah User Baru
    </a>
</p>

    @include('layouts.alerts')

    <table class="table table-bordered" id="users-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>EMAIL</th>
                <th>IC</th>
                <th>ROLE</th>
                <th>ACTION</th>
            </tr>
        </thead>

    </table>

</div>
</div>
</div>
</div>
</div>
@endsection

@section('script')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('users.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'ic', name: 'ic' },
            { data: 'role', name: 'role' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>

@endsection
