<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.header')    
</head>

<body>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('layouts.menu')

            @if($dataContainer->siderbar_type=='execute')
                @include('layouts.siderbar.execute')
            @elseif($dataContainer->siderbar_type=='assets')
                @include('layouts.siderbar.assets')
            @elseif($dataContainer->siderbar_type=='request')
                @include('layouts.siderbar.request')
            @elseif($dataContainer->siderbar_type=='providers')
                @include('layouts.siderbar.providers')
            @elseif($dataContainer->siderbar_type=='planning')
                @include('layouts.siderbar.planning')
            @elseif($dataContainer->siderbar_type=='purchase')
                @include('layouts.siderbar.purchase')
            @elseif($dataContainer->siderbar_type=='risks')
                @include('layouts.siderbar.risks')
            @elseif($dataContainer->siderbar_type=='rrhh')
                @include('layouts.siderbar.rrhh')
            @endif
        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>