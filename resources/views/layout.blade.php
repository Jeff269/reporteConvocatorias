<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        html,body{
    margin: 0;
    padding: 0;
    width: 100%;
}

#head{
    width: 90%;
    margin: 15px 5%;
}

.cab img{
    width: 100px;
    margin: 15px;
}
hr{
    margin: 0;
    padding: 0;
}
#contenido{
    text-align: center;
}
#contenido h2{
    text-align: start;
}

.noapto{
    color: red;
    font-weight: bold;
}

.firmas{
    padding: 0 5%;
}

.box-firma{
    border-bottom: 1px solid  #000;
    height: 300px;
    width: 27%;
    margin-bottom: 200px;
}
    </style>
</head>
<body>
    <div id='head'>
        <div class="cab d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1>Universidad Nacional del Centro del Perú</h1>
                <p>“Año del Fortalecimiento de la Soberanía Nacional”</p>
            </div>   
        </div>
        <hr>
        <h2 class="text-center">CONCURSO PÚBLICO N° 001-2022-UNCP PARA CUBRIR 
            VACANTES POR CONTRATO PERSONAL ADMINISTRATIVO 
            DECRETO LEGISLATIVO 1057 (VACANTES-SUPLENCIA)
            EN LA UNCP
        </h2>
        <hr>
        <div id="contenido">
            @yield('contenido')
        </div>
        <div class="firmas d-flex justify-content-around">

            <div class="box-firma"></div>
            <div class="box-firma"></div>
            <div class="box-firma"></div>

        </div>
    </div>
    <hr>
    <p class="w-100 text-center">&copy; Universidad Nacional del Centro del Perú - Oficina de Información y Comunicación</p>
</body>
</html>