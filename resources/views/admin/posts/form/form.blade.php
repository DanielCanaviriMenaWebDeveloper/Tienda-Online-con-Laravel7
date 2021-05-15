{!! Form::hidden('user_id', auth()->user()->id) !!}

<div class="form-group">
    {!! Form::label('name', 'Titulo') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

{{-- < class="form-row"> --}}
	<div class="form-group col">
		{!! Form::label('category_id', 'Categorías') !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
	</div>
	
	{{-- <div class="form-group col">
		{!! Form::label('image', 'Imagen') !!}
		<div class="custom-file">
			<input type="file" class="custom-file-input" name="image" lang="es">
			<label class="custom-file-label" name="image">Seleccionar Archivo</label>
		</div>
		<small class="form-text text-muted">
			Solo archivos de imágenes de dimenciones 1200x490 px.
		</small>
    </div> --}}
    
    <div class="form-group">
        {!! Form::label('image', 'Imagen') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group">
	{!! Form::label('status', 'Estado de la publicación') !!}
    <label>
        from
        {!! Form::radio('status', 'PUBLISHED') !!} Publicado
    </label>
    <label>
        from
        {!! Form::radio('status', 'DRAFT') !!} Borrador
    </label>
</div>

<div class="form-group">
	{!! Form::label('abstract', 'Resumen') !!}
	{!! Form::textarea('abstract', null, ['class'=>'form-control', 'rows' => '3']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Contenido') !!}
	{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

{{-- <div class="form-group">
	{!! Form::label('status', 'Estado de la publicación') !!}
	<div class="form-check">
		<input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="PUBLISHED">
		<label class="form-check-label" for="exampleRadios1">
			Publicar
		</label>
	</div>
	<div class="form-check">
		<input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="DRAFT">
		<label class="form-check-label" for="exampleRadios2">
			Borrador
		</label>
	</div>
</div> --}}


@section('scripts')
	{!! Html::script('vendor/ckeditor/ckeditor.js') !!}
	<script>
		CKEDITOR.replace('body');
	</script>
@endsection