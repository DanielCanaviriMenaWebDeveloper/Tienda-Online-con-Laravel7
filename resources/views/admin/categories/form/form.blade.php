<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('module', 'Modulo') !!}

    {{-- El parametro null hace referencia a la posición por defecto del array --}}
    {!! Form::select('module', getModulesArray(), null, ['class'=>'form-control']) !!}
</div>