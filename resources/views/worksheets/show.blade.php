@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Worksheet
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <a href="{!! route('worksheets.index') !!}" class="btn btn-default">Back</a>
                <div class="row" style="padding-left: 20px">

                    @include('worksheets.show_fields')

                </div>
            </div>
        </div>
    </div>
@endsection
