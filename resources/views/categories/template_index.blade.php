@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">Halaman Senarai Kategori</div>

<div class="card-body">

    <p>
        <a href="<?php echo route('categories.create'); ?>" class="btn btn-primary">
        Tambah Kategori Baru
        </a>
    </p>

    @include('layouts.alerts')

    @if ( count( $senarai_categories ) )

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>KOD</th>
                <th>NAMA</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach( $senarai_categories as $item )

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kod_kategori }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('categories.edit', ['id' => $item->id ]) }}">EDIT</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
                        DELETE
                    </button>

                    <!-- Modal -->
                    <form method="POST" action="{{ route('categories.destroy', ['id' => $item->id ]) }}">
                    @csrf
                    @method('delete')

                    <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Adakah anda bersetuju untuk menghapuskan data berikut:

                            <p>ID: {{ $item->id }}</p>
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

    {{ $senarai_categories->links() }}
    {{ $senarai_categories->render() }}

    @endif

</div>
</div>
</div>
</div>
</div>
@endsection
