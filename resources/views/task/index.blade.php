<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task-List</title>

    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .header{
            background: #333;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .nav a{
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }

        .nav a:hover{
            background: #fff;
            color: #333;
        }

        .logout{
            float: right;
            margin-right: 20px;
            position: relative;
            top: -35px;
        }

        .logout a{
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #803030;
        }

        .logout a:hover{
            background: #fff;
            color: #333;
        }

        .task-list{
            width: 80%;
            margin: 0 auto;
            margin-top: 20px;
            border-bottom: 1px solid #333;
        }

        .task-list .row{
            display: flex;
            justify-content: space-between;
        }

        .task-list #titulos{
            background: #333;
            color: #fff;
            padding: 10px 0;
        }

        .task-list .col{
            width: 25%;
        }

        .task-list .col h1{
            text-align: center;
            font-size: 20px;
        }

        .task-list #contenido-row{

            padding: 10px 0;
        }

        .task-list .col h3{
            text-align: center;
            font-size: 16px;
            margin-top: 30px;
        }

        .task-list .col div{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .task-list .col div h3{
            text-decoration: none;
            color: #333;
        }

        .col div #completado{
            width: 20px;
            height: 20px;
            border: 1px solid #333;
            border-radius: 50%;
            margin-right: 10px;
            margin-top: 25px;
        }

        .row .col a{
            text-decoration: none;
            color: #ffffff;
            justify-content: center;
            align-items: center;
        }

        .row .col a:hover{
            color: #fff;
            background: #333;
        }

        .col #completado:hover{
            background: #333;
        }

        .nueva{
            text-align: center;
            margin-top: 20px;
        }

        button{
            width: 20%;
            padding: 10px;
            margin-bottom: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: #2b965b;
            color: #fff;
            cursor: pointer;
        }

        button:hover{
            background: #0f4e2c;
            color: #333;
        }

        button a{
            color: #fff;
            text-decoration: none;
        }

        .task-list .col .task-completed {
            text-decoration: line-through;
            color: gray; /* Puedes ajustar el color a tu preferencia */
        }

        .task-list .col.actions {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .task-list .col.actions a {
            margin: 5px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .pagination a {
            text-decoration: none;
            color: #333;
        }



    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>
<body>
    <div class="header">
        <div class="nav justify-content-center">
            <a href="/">Home</a>
            <a href="/task-list">Tasks</a>
            <a href="/about">About</a>
        </div>
        <div class="logout">
            <a href="/logout">Cerrar Sesión</a>
        </div>
    </div>

    <div class="task-list">
        <div class="row" id="titulos">
            <div class="col">
                <h1>Task List</h1>
            </div>

            <div class="col">
                <h1>Fecha vencimiento</h1>
            </div>

            <div class="col">
                <h1>Hora vencimiento</h1>
            </div>

            <div class="col">
                <h1>Prioridad</h1>
            </div>

            <div class="col actions">
                <h1>Acciones</h1>
            </div>
        </div>

        @foreach ($tareas as $tarea)
            <div class="row" id="contenido-row">

                <div class="col" id="check">
                    <div>
                        <a id="completado" href="{{route('completado', ['id' => $tarea->id])}}"></a>
                        <h3 class="{{ $tarea->completado ? 'task-completed' : '' }}">{{$tarea->nombre_tarea}}</h3>
                    </div>
                </div>

                <div class="col">
                    <h3>{{$tarea->fecha_vencimiento}}</h3>
                </div>

                <div class="col">
                    <h3>{{$tarea->hora_vencimiento}}</h3>
                </div>

                <div class="col">
                    <h3>{{$tarea->prioridad}}</h3>
                </div>

                <div class="col actions">
                    <a href="{{route('edit', ['id' => $tarea->id])}}" class="btn btn-primary mb-1">Editar</a>
                    <a href="{{route('delete', ['id' => $tarea->id])}}" class="btn btn-danger">Eliminar</a>
                </div>
           </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $tareas->links() !!}
    </div>

    <div class="nueva">
        <a href="{{route('create')}}" class="btn btn-success">Nueva Tarea</a>
    </div>



</body>
</html>

