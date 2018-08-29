@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Lesen</div>

                <div class="card-body">

                    @include('layouts.alerts')

<form method="POST" action="{{ route('licenses.store') }}">
@csrf

    <div class="form-group">
        <label>KATEGORI</label>
        <select name="category_id" class="form-control">

            @foreach( $senarai_kategori as $item )
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label>TARIKH MULA</label>
        <input class="form-control" type="date" name="tarikh_mula" value="{{ old('tarikh_mula') }}">
    </div>

    <div class="form-group">
        <label>TARIKH TAMAT</label>
        <input class="form-control" type="date" name="tarikh_tamat" value="{{ old('tarikh_tamat') }}">
    </div>

    <div class="form-group">
        <label>REMARKS</label>
        <textarea class="form-control" name="remarks">{{ old('remarks') }}</textarea>
    </div>

    <div class="form-group">
        <label>PROVIDER</label>
        <input class="form-control" type="text" name="provider" value="{{ old('provider') }}">
    </div>

    <div class="form-group">
        <label>STATUS</label>
        <select name="status" class="form-control">

            @foreach( $senarai_status as $item )
            <option value="{{ $item['status'] }}">{{ $item['status'] }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <a href="<?php echo route('licenses.index'); ?>" class="btn btn-secondary">
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
