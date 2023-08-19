<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar tarea</title>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .header {
            background: #333;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }

        .nav a:hover {
            background: #fff;
            color: #333;
        }

        .form-group {
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-group form {
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            background: #333;
            color: #fff;
        }

        .form-group form input[type="text"],
        .form-group form input[type="date"],
        .form-group form input[type="time"],
        .form-group form input[type="submit"],
        .form-group form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group form input[type="submit"] {
            background: #2b965b;
            color: #fff;
            cursor: pointer;
        }

        .form-group form input[type="submit"]:hover {
            background: #fff;
            color: #333;
        }

        .form-group form label {
            font-size: 16px;
        }

        .form-group form select {


        }

        .form-group form select option {
            background: #333;
            color: #fff;
        }

        .form-group form select option:hover {
            background: #f846c3;
            color: #333;
        }

        .form-group form select option .fa {
            margin-right: 10px;
        }




    </style>
</head>
<body>

    <div class="header">
        <div class="nav">
            <a href="/">Home</a>
            <a href="/task-list">Tasks</a>
            <a href="/about">About</a>
        </div>
    </div>

    <div class="form-group">
        <form action="{{route('update', ['id' => $tareas->id])}}" method="post">
            @csrf

            <div class="tarea">
                <label for="nombre_tarea">Tarea</label>
                <input type="text" name="nombre_tarea" id="nombre_tarea" placeholder="Nombre de tarea" value="{{$tareas->nombre_tarea}}">
            </div>

            <div class="fecha">
                <label for="fecha_vencimiento">Fecha de vencimiento</label>
                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" value="{{$tareas->fecha_vencimiento}}">
            </div>

            <div class="hora">
                <label for="hora_vencimiento">Hora de vencimiento</label>
                <input type="time" name="hora_vencimiento" id="hora_vencimiento" value="{{$tareas->hora_vencimiento}}">
            </div>

            <div class="prioridad">
                <label for="prioridad">Prioridad</label>
                <select class="form-control fa" name="prioridad" id="prioridad">
                    <option value="">{{$tareas->prioridad}}</option>
                    <option class="fa" value="alta">&#xf062; Alta</option>
                    <option class="fa" value="media">&#xf061; Media</option>
                    <option class="fa" value="baja">&#xf063; Baja</option>
                </select>
            </div>

            <div class="input">
                <input type="submit" value="Guardar">
            </div>

</body>
</html>
