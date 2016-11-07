@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit User
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">


                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('name', 'name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('password_confirmation', 'Password confirmation') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        Roles
                        @foreach($roles as $role)
                            <?php $checked = $userRoles->get()->contains($role->id); ?>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('role[]', $role->id, $checked) !!} {{ $role->display_name }}
                                    </label>
                                </div>
                        @endforeach
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
