@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Users</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="label label-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td width="80"><a class="btn btn-primary" href="{{ URL::route('users.edit', $user->id) }}">Edit</a></td>
                            <td width="80">{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure?");']) !!}
                                {!!  Form::close() !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $users->render() !!}

            </div>
        </div>
    </div>
@endsection

