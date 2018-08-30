@extends('layouts.app')

@section('css')
<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Halaman Senarai Kategori</div>

<div class="card-body">

    <p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Tambah Kategori Baru
        </a>
    </p>

    @include('layouts.alerts')

    <table class="table table-bordered" id="categories-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>KOD</th>
                <th>NAMA</th>
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
    $('#categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('categories.datatables') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'kod', name: 'kod' },
            { data: 'nama', name: 'nama' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>

@endsection
