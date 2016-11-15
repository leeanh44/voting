@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('user.name')) !!}
    {{ $user->name }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('user.email')) !!}
    {{ $user->email }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('user.avatar'), array('class' => 'control-label')) !!}
    {!! Form::image(Auth::user()->avatar, 'btnSub', array('class' => 'img-circle', 'id' => 'output', 'style' => 'width:100px;height:100px;display:block;')) !!}
    
</div>
<div class="clearfix"></div>

<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('labels.created_at')) !!}
    {{ $user->created_at }}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('update_at', trans('labels.updated_at')) !!}
    {{ $user->updated_at }}
</div>
<div class="clearfix"></div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('labels.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('user.index') !!}" class="btn btn-default">{{ trans('labels.back') }}</a>
</div>