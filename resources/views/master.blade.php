<!Doctype html>
<html>
<head>
    <title>Sistema Ganadero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/colorgraph.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.file-input.js"></script>
    <script type="text/javascript" charset="UTF-8" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="../js/bootstrap.min.js"></script>
    <style type="text/css">
    body{
        padding-bottom: 70px;
        background-color: #eeeff4;
        font-family: Lucida Grande, "Tahoma";
    }
    .navbar a label{
        font-family: Lucida Grande, "Tahoma";
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-inverse">
        <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"aria-hidden="true"/> <label>Inicio</label></a>
    </nav>
    <div class="container">
        @yield('content')

        @yield('footer')
    </div>
</body>
</html>
