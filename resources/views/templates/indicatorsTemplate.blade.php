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
            @endif
        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>