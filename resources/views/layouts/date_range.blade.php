	@if (count($errors) > 0)
	    <div class="form-group">
        <ul class="nav">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

{!! Form::open(['data-parsley-validate','url'=>$dataContainer->url_post,'role'=>'form', 'id'=>'search-form','class' => 'form-group']) !!}
	{!!Form::token()!!}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Rellene los campos requeridos</h3>
		</div>
		<div class="panel-body">
		<div class="search_bar">


			<div class ="row">
				@if($dataContainer->patrimonial_code)
				<div class="form-group col-md-4">
					{!! Form::label('search_codigo_patrimonial','Código Patrimonial') !!}
					{!! Form::text('search_codigo_patrimonial',null,['class'=>'form-control']) !!}
				</div>
				@endif
				
				@if($dataContainer->serial_number)
				<div class="form-group col-md-4">
					{!! Form::label('search_numero_serie','Número de serie') !!}
					{!! Form::text('search_numero_serie',null,['class'=>'form-control']) !!}
				</div>
				@endif

				@if($dataContainer->model)
				<div class="form-group col-md-4">
					{!! Form::label('search_modelo','Modelo') !!}
					{!! Form::text('search_modelo',null,['class'=>'form-control']) !!}
				</div>
				@endif
			</div>

			<div class="row">
				@if($dataContainer->group)
				<div class="form-group col-md-4">
					{!! Form::label('search_grupo','Grupo') !!}
					<select id="search_grupo" name="search_grupo" class="form-control chosen-select">
                      <option id="0" value="0">Seleccione una opción</option>
                      @foreach($dataContainer->groups as $group)
                      <option id="{!!$group->idgrupo!!}" value="{!!$group->idgrupo!!}">{!!$group->nombre!!}</option>
                      @endforeach
                    </select>					
				</div>
				@endif

				@if($dataContainer->service)
				<div class="form-group col-md-4">
					{!! Form::label('search_servicio','Servicio') !!}
					<select id="search_grupo" name="search_grupo" class="form-control chosen-select">
                      <option id="0" value="0">Seleccione una opción</option>
                      @foreach($dataContainer->services as $service)
                      <option id="{!!$service->idservicio!!}" value="{!!$service->idservicio!!}">{!!$service->nombre!!}</option>
                      @endforeach
                    </select>	
				</div>
				@endif

			@if($dataContainer->departament)
				<div class="form-group col-md-4">
					{!! Form::label('search_departament','Departamento') !!}
					{!! Form::select('search_departament', array(
					'0'=>'Seleccione una opción',
					'1' => 'Departamento de obstetricia y perinatologia',
					'2' => 'Departamento de cuidados críticos',
					'3' => 'Departamento de ginecologia',
					'4' => 'Departamento de obstetrices',
					'5' => 'Departamento de neonatología',
					'6' => 'UIB',
					'7' => 'Departamento de Especialidades médicas',
					'8' => 'Departamento de patología',
					'9' => 'Departamento de anestecia, analfesia y reanimación',
					'10' => 'Departamento de servicios complementarios',
					'11' => 'Departamento de enfermeria',
					'12' => 'Oficina de economía',
					'13' => 'Oficina de logística',
					'14' => 'Oficina de recursos humanos',
					'15' => 'Oficina de servicios generales',
					'16' => 'Oficina de estadística e informatica',
					'17' => 'Oficina de comunicaciones',
					'18' => 'Oficina ejecutiva de apoyo a la investigacion y do...',
					'19' => 'Oficina ejecutiva de planeamiento estrategico',
					'20' => 'Oficina de asesoria juridica',
					'21' => 'Oficina de epidemiologia y salud ambiental',
					'22' => 'Oficina de gestion de la calidad',
					'23' => 'Oficina de cooperacion cientifica internacional',
					'24' => 'Oficina ejecutiva de administracion',
					'25' => 'Direccion ejecutiva de investigación, docencia y atención en obstreticia y ginecología',
					'26' => 'Direccion ejecutiva de investigación docencia y atención en neonatología',
					'27' => 'Dirección ejecutiva de apoyo de especialidades médicas y servicios complementarios',
					'28' => 'Dirección general',
					'29' => 'Organo de control institucional'
					),null,['class'=>'form-control chosen-select']) !!}
				</div>
				@endif
			</div>


			

			@if($dataContainer->date)
			<div class="row">						
				<div class="form-group col-md-4">
					{!! Form::label('search_fecha_ini','Fecha inicio *') !!}
					<div id="datetimepicker_search_anho1" class="form-group input-group date">
						{!! Form::text('search_fecha_ini',null,['required'=>'required','class'=>'form-control','readonly'=>'']) !!}
						<span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
					</div>
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('search_fecha_fin','Fecha fin *') !!}
					<div id="datetimepicker_search_anho2" class="input-group date">
						{!! Form::text('search_fecha_fin',null,['required'=>'required','class'=>'form-control','readonly'=>'']) !!}
						<span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
					</div>
				</div>
			</div>
			@endif

			<div class="col-md-12">
				<div class="form-group col-md-2 col-md-offset-8">
					
				</div>
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
      '.chosen-select'           : {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>