@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Pengguna</div>

                <div class="card-body">

                    @include('layouts.alerts')

{{--<form method="POST" action="{{ route('users.store') }}"> comment laravel--}}
{!! Form::open(['route' => 'users.store']) !!}

    @include('users/template_borang')

{!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>

@endsection
