<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
    

    <!-- For table style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- File dropzone -->
    <script src="{{ asset('js\kartik-v-bootstrap-fileinput-043694a\js\fileinput.min.js') }}"></script>
    <script src="{{ asset('js\kartik-v-bootstrap-fileinput-043694a\themes\fas\theme.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('js/kartik-v-bootstrap-fileinput-043694a/css/fileinput.min.css') }}">
    
    <!-- Custom JS -->
    <script src=""></script>
            
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css')}}" >
    <title>@yield('title')</title>
</head>
<body>
    @include('nav')
    @yield('content')
    @stack('scripts')
</boby>
</html>