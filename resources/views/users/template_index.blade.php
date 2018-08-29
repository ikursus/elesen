@extends('layouts.app')

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

    @if ( count( $senarai_users ) )

    <table class="table table-bordered">
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

        <tbody>

            @foreach( $senarai_users as $item )

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->ic }}</td>
                <td>{{ $item->role }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('users.edit', ['id' => $item->id ]) }}">EDIT</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
                        DELETE
                    </button>

                    <!-- Modal -->
                    <form method="POST" action="{{ route('users.destroy', ['id' => $item->id ]) }}">
                    @csrf
                    @method('delete')

                    <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pengesahan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Adakah anda bersetuju untuk menghapuskan data berikut:

                            <p>Nama: {{ $item->nama }}</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    </form>

                </td>
            </tr>

            @endforeach

        </tbody>


    </table>

    @endif

</div>
</div>
</div>
</div>
</div>
@endsection
