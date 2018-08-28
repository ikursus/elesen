@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Kategori</div>

                <div class="card-body">

                    @include('layouts.alerts')
                    
<form method="POST" action="{{ route('categories.update', ['id' => $id]) }}">
@csrf
@method('patch')
    <div class="form-group">
        <label>KOD KATEGORI</label>
        <input class="form-control" type="text" name="kod">
    </div>

    <div class="form-group">
        <label>NAMA KATEGORI</label>
        <input class="form-control" type="text" name="nama">
    </div>

    <div class="form-group">
        <a href="<?php echo route('categories.index'); ?>" class="btn btn-secondary">
            BACK
        </a>
        <button type="submit" class="btn btn-primary float-right">SAVE</button>
    </div>

</form>

</div>
</div>
</div>
</div>
</div>

@endsection
