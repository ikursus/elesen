@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Pengguna</div>

                <div class="card-body">

<form>

    <div class="form-group">
        <label>Nama Pengguna</label>
        <input class="form-control" type="text" name="nama">
    </div>

    <div class="form-group">
        <label>Username</label>
        <input class="form-control" type="text" name="username">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email">
    </div>

    <div class="form-group">
        <label>No. KP</label>
        <input class="form-control" type="text" name="ic">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password">
    </div>

    <div class="form-group">
        <label>Password Confirmation</label>
        <input class="form-control" type="password" name="password_confirmation">
    </div>

    <div class="form-group">
        <label>Role / Level</label>
        <select name="role" class="form-control">
            <option value="ADMIN">ADMIN</option>
            <option value="STAFF">STAFF</option>
            <option value="USER">USER</option>
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
