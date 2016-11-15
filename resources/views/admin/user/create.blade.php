@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('user.edit_user') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {{ Form::model(array('route' => array('user.store'), 'method' => 'PUT', 'files' => true)) }}

                        @include('admin.user.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection