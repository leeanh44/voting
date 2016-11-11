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

<div class="form-group">
    {!! Form::label('avatar', 'Avatar:', array('class' => 'col-md-4 control-label')) !!}
    <div class="col-md-6">
        {!! Form::image(Auth::user()->avatar, 'btnSub', array('class' => 'img-circle', 'id' => 'output', 'style' => 'width:100px;height:100px;display:block;')) !!}
        {!! Form::file('avatar', array('onchange' => 'loadFile(event)') ) !!}
    </div>
    
</div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<div class="clearfix"></div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('user.index') !!}" class="btn btn-default">{{ trans('user.back') }}</a>
</div>