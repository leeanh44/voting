@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group col-sm-6">
    {!! Form::label('name', trans('user.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('user.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', trans('user.password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>

<div class="form-group clo-sm-12">
    {!! Form::label('avatar', trans('user.avatar'), array('class' => 'col-md-1 control-label')) !!}
    {!! Form::image(Auth::user()->avatar, 'btnSub', array('class' => 'img-circle', 'id' => 'output', 'style' => 'width:100px;height:100px;display:block;')) !!}
    {!! Form::file('avatar', array('onchange' => 'loadFile(event)') ) !!}
</div>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<div class="clearfix"></div>

<div class="form-group col-sm-12">
    {!! Form::submit(trans('labels.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('user.index') !!}" class="btn btn-default">{{ trans('labels.back') }}</a>
</div>