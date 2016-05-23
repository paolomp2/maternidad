@extends('templates.indicatorsTemplate')

@section('content')
<div class="row">
	<div class="col-lg-12">
        <h3 class="page-header">{!!$dataContainer->report_name!!}</h3>            
    </div>   
</div>
@include('layouts.date_range')

@endsection