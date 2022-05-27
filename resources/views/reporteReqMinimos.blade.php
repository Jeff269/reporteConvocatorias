<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
    <style>
        @page{
            margin: 10mm !important
        }
        html,body{
        margin: 0;
        padding: 0;
        width: 100%;
        }
        html{
            font-size: 0.8em;
            font-family: Arial, Helvetica, sans-serif;
        }
    
        #head{
            padding: 0 5%
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
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #contenido h2{
            text-align: start;
        }
    
    
        .noapto{
            color: red;
            font-weight: bold;
        }

    
        .firmas{
            height: 300px;
        }
    
        .box-firma{
            border-bottom: 1px solid #000;
            height: 300px;
            width: 150px;
            margin-bottom: 200px;
        }
        .d-flex{
            display: flex;
        }
        .justify-content-center{
            justify-content: center;
        }
        .align-items-center{
            align-items: center;
        }
        .flex-column{
            flex-direction: column;
        }
        .w-100{
            width: 100%;
        }
        .text-center{
            text-align: center;
        }
        .col-1{
            width: 10%
        }
        .col-2{
            width: 20%
        }
        .table{
            width: 80%;
            margin-bottom: 40px;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        tr,td,th{
            border: 1px solid #000
        }
        .nota{
            padding: 0 5%;
            text-align: justify
        }
        .text-start{
            text-align: left !important;
            padding-left: 5px
        }
    </style>
</head>
<body>
    <div id='head'>
        <div class="cab d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="text-center">Universidad Nacional del Centro del Perú</h1>
                <p class="text-center">“Año del Fortalecimiento de la Soberanía Nacional”</p>
            </div>
        </div>
        <hr>
        <h2 class="text-center">CONCURSO PÚBLICO N° 001-2022-UNCP PARA CUBRIR 
            VACANTES POR CONTRATO PERSONAL ADMINISTRATIVO 
            DECRETO LEGISLATIVO 1057 (VACANTES-SUPLENCIA)
            EN LA UNCP
        </h2>
    </div>
        <hr>
    <div id="contenido">
        <h1>
            RESULTADOS DE LA FASE DE REQUISITOS MINIMOS
        </h1>
        <br>
        @foreach ($plazas as $plaza)
                <p style="display: none">{{$i=0}}</p>
                <h2>
                    {{$plaza->t8_plaza}}
                </h2>        
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="col-1">#</th>
                            <th class="col-8">Nombres y Apellidos</th>
                            <th class="col-3">Apto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reportes as $reporte)
                            @if ($plaza->t8_id == $reporte->t8_id)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td class="text-start">{{$reporte->nombre}}</td>
                                    <td class="{{$reporte->t13_minimo == '1'?'apto':'noapto'}}">{{$reporte->t13_minimo == '1'?'Apto':($reporte->t13_minimo == '0'?'No Apto':'No Calificado')}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endforeach
    </div>
    <div class="nota">
        <p><b>NOTA: </b>: LOS POSTULANTES QUE CUMPLIERON CON LOS REQUISITOS MÍNIMOS DE ACUERDO A LAS BASES PASAN 
        A LA EVALUACIÓN DE CONOCIMIENTOS VIRTUAL (POR PLATAFORMA MICROSFOT TEAMS),
        PROGRAMADO PARA EL DÍA 31 DE MAYO A LAS 3:00 PM; LAS CREDENCIALES PARA ACCEDER A TAL REUNIÓN
        ESTAN UBICADAS EN EL SISTEMA DE CONVOCATORIAS, EN LA PARTE DONDE SE MUESTRA SU CUENTA
        SE LES HABILITARÁ LA OPCIÓN DE "DATOS DE REUNIÓN Y EXAMEN"
        </p>
        <p>
            EN CASO DE REQUERIR APOYO,
            LLAMAR A LOS NUMEROS DE SOPORTE<br>
            - Contacto N° 1: Cel: 963 532 608<br>
            - Contacto N° 2: Cel: 997 667 147<br>
            - Contacto N° 3: Cel: 975 318 567
        </p>
    </div>
    <div class="firmas">
    </div>
    
    <hr>
    <p class="w-100 text-center">&copy; Universidad Nacional del Centro del Perú - Oficina de Información y Comunicación</p>
</body>
</html>
