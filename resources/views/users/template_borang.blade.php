<div class="form-group">
    <label>Nama Pengguna</label>
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
    {!! $errors->first('nama', '<span style="color: red">:message</span>') !!}
</div>

<div class="form-group">
    <label>Username</label>
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
    {!! $errors->first('username', '<span class="text-danger">:message</span>') !!}
</div>

<div class="form-group">
    <label>Email</label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! $errors->first('email') !!}
</div>

<div class="form-group">
    <label>No. KP</label>
    {!! Form::text('ic', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Alamat</label>
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Password</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Password Confirmation</label>
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label>Role / Level</label>
    {{--<select name="role" class="form-control">
        <option value="ADMIN">ADMIN</option>
        <option value="STAFF">STAFF</option>
        <option value="USER">USER</option>
    </select>
    --}}
    {!! Form::select('role', ['ADMIN' => 'ADMIN', 'STAFF' => 'STAFF', 'USER' => 'USER'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <a href="<?php echo route('users.index'); ?>" class="btn btn-secondary">
        BACK
    </a>
    <button type="submit" class="btn btn-primary float-right">SAVE</button>
</div>
