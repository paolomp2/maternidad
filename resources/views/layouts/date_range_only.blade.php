@if (count($errors) > 0)
	    <div class="form-group">
        <ul class="nav">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
@endif

{!! Form::open(['url'=>$data['url_post'],'role'=>'form', 'id'=>'search-form','class' => 'form-group']) !!}
	{!!Form::token()!!}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Rango de fechas para el reporte</h3>
		</div>
		<div class="panel-body">
		<div class="search_bar">						

			<div class="row">						
				<div class="form-group col-md-4">
					{!! Form::label('search_fecha_ini','Fecha de Inicio *') !!}
					<div id="datetimepicker_search_anho1" class="form-group input-group date">
						{!! Form::text('search_fecha_ini',null,['class'=>'form-control','readonly'=>'']) !!}
						<span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
					</div>
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('search_fecha_fin','Fecha de Fin *') !!}
					<div id="datetimepicker_search_anho2" class="input-group date">
						{!! Form::text('search_fecha_fin',null,['class'=>'form-control','readonly'=>'']) !!}
						<span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group col-md-2 col-md-offset-8"></div>
				<div class="form-group col-md-2">
					{!! Form::button('<span class="glyphicon glyphicon-search"></span> Buscar', array('id'=>'submit-search-form','type' => 'submit', 'class' => 'btn btn-primary btn-block')) !!}							
				</div>
			</div>
		</div>	
		</div>
	</div>
{!! Form::close() !!}</br>

<script type="text/javascript">
    var config = {
      '.chosen-select': {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
</script>