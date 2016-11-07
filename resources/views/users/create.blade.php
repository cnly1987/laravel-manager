@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Create User
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                    {!! Form::open(['route' => 'users.store']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('password_confirmation', 'Password confirmation') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="">Roles</label>
                        @foreach($roles as $role)
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('role[]', $role->id) !!} {{ $role->display_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
