<meta charset="UTF-8">
<meta name="robots" content="noindex, follow">
<title>{!!$dataContainer->page_name or "GTS"!!}</title>


<link rel="shortcut icon" href="{{ asset('img')}}/logo_gts.png">
<!-- Bootstrap Core CSS -->
<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- Datepicker CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
<!-- MetisMenu CSS -->
<link href="{{ asset('bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
<!-- Timeline CSS -->
<link href="{{ asset('dist/css/timeline.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="{{ asset('bower_components/morrisjs/morris.css') }}" rel="stylesheet">
<!-- Custom Fonts -->
<link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/tab-menus.css') }}" rel="stylesheet">
<!--Bootstrap-Dialog CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap-dialog.min.css') }}">
<!--CHARTS-CSS-->
<link rel="stylesheet" href="{{ asset('charts/chartist.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/chosen.css') }}">

<script type="text/javascript">        
</script>
<!-- jQuery -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Moment JavaScript -->
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<!-- Bootstrap Datepicker JavaScript -->
<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
<!-- Morris Charts JavaScript -->
<script src="{{ asset('bower_components/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('bower_components/morrisjs/morris.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
<script src="{{ asset('js/fileinput.min.js') }}"></script>
<script src="{{ asset('js/fileinput_locale_es.min.js') }}"></script>
<script src="{{ asset('js/language_file_upload_plugin.min.js') }}"></script>
<!--Bootstrap-Dialog Javascritp-->
<script src="{{asset('js/bootstrap-dialog.min.js') }}"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<!--Bootstrap-Dialog Javascritp-->
<script src="{{asset('js/date_picker.js') }}"></script>
<!--CHARTS Javascritp-->
<script src="{{asset('js/Chart.js') }}"></script>
<!--SELECTS Javascritp-->
<script src="{{asset('js/chosen.jquery.js') }}"></script>

@if($dataContainer->chart)
	@if($dataContainer->chart_model=='execute.time.1')
	<script src="{{asset('js/execute/time/1.js') }}"></script>
	@endif
@endif

@if($dataContainer->table==true)
  {!!Html::script('js/data_tables/jquery.dataTables.js')!!}
  {!!Html::script('js/data_tables/script_table.js')!!}  
@endif