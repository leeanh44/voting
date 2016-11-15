@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ trans('user.show_user') }}</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" href="{!! route('user.create') !!}">{{ trans('user.add_user') }}</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
            @if(Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
            @endif
        <div class="box box-primary">
            <div class="box-body col-sm-12">
                @include('admin.user.show_fields')
            </div>
        </div>
    </div>
@endsection