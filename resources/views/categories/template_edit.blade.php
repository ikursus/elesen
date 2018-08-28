<h1>
    {{ $page_title }}
    {{ $id }}
</h1>

<hr>

<form>

    <div>
        <label>Nama Pengguna</label>
        <input type="text" name="nama">
    </div>

    <div>
        <label>Username</label>
        <input type="text" name="username">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email">
    </div>

    <div>
        <label>No. KP</label>
        <input type="text" name="ic">
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div>
        <label>Password Confirmation</label>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <label>Role / Level</label>
        <select name="role">
            <option value="ADMIN">ADMIN</option>
            <option value="STAFF">STAFF</option>
            <option value="USER">USER</option>
        </select>
    </div>

    <div>
        <button type="submit">SAVE</button>
    </div>

</form>

</hr>

<a href="<?php echo route('users.index'); ?>">
    Kembali Ke Senarai User
</a>
