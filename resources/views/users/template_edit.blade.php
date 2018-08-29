@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Pengguna {{ $user->nama }}</div>

                <div class="card-body">

                    @include('layouts.alerts')

<form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
@csrf
@method('patch')

    <div class="form-group">
        <label>Nama Pengguna</label>
        <input type="text" name="nama" value="{{ $user->nama }}">
    </div>

    <div class="form-group">
        <label>Username</label>
        <input class="form-control" type="text" name="username" value="{{ $user->username }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="{{ $user->email }}">
    </div>

    <div class="form-group">
        <label>No. KP</label>
        <input class="form-control" type="text" name="ic" value="{{ $user->ic }}">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password">
    </div>

    <div class="form-group">
        <label>Role / Level</label>
        <select name="role" class="form-control">
            <option value="ADMIN"{{ $user->role == 'ADMIN' ? ' selected=selected' : '' }}>ADMIN</option>
            <option value="STAFF"{{ $user->role == 'STAFF' ? ' selected=selected' : '' }}>STAFF</option>
            <option value="USER"{{ $user->role == 'USER' ? ' selected=selected' : '' }}>USER</option>
        </select>
    </div>

    <div class="form-group">
        <a href="<?php echo route('users.index'); ?>" class="btn btn-secondary">
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
