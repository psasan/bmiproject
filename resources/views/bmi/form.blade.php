@if(isset($bmi))
    {!! Form::hidden('id_bmi',$bmi->id_bmi) !!}
@endif

@if($errors->any())
    <div class="form-group {{ $errors->has('tinggi')?'has-error':'has-success' }}" name="tinggi" value="{{ old('tinggi') }}" required autofocus>
@else
    <div class="form-group">
@endif
    <center>{!! Form::label('tinggi','Height (Cm)',['class'=>'control-label']) !!}</center>
    <center>{!! Form::text('tinggi',null,['class'=>'foo']) !!}</center>
    
    @if ($errors->has('tinggi'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('tinggi') }}</strong>
        </span>
     @endif
</div>


@if($errors->any())
    <div class="form-group {{ $errors->has('berat')?'has-error':'has-success' }}" name="tinggi" value="{{ old('tinggi') }}" required autofocus>
@else
    <div class="form-group">
@endif
    <center>{!! Form::label('berat','Weight (Kg)',['class'=>'control-label']) !!}</center>
    <center>{!! Form::text('berat',null,['class'=>'foo']) !!}</center>
    @if ($errors->has('berat'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('berat') }}</strong>
        </span>
     @endif
</div>

<center>
    <div>
        {!! Form::submit($submitButtonText,['class'=> 'btn btn-success', 'style'=>'box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19)']) !!}
    </div>
</center>

