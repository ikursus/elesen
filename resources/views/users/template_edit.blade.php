@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maklumat Pengguna {{ $user->nama }}</div>

                <div class="card-body">

                    @include('layouts.alerts')

{{--<form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">--}}
{!! Form::model($user, ['route' => ['users.update', 'id' => $user->id] ]) !!}
@method('patch')

@include('users/template_borang')

{!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>

@endsection
