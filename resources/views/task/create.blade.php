<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar nuevas tareas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <style>
        body {
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

        .form-group {
            width: 50%;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-group form {
            padding: 20px;
            border-radius: 5px;
            background: #f8f9fa;
        }

        .form-group form input[type="text"],
        .form-group form input[type="date"],
        .form-group form input[type="time"],
        .form-group form input[type="submit"],
        .form-group form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .form-group form input[type="submit"] {
            background: #2b965b;
            color: #fff;
            cursor: pointer;
        }

        .form-group form input[type="submit"]:hover {
            background: #0f4e2c;
        }

        .form-group form label {
            font-size: 16px;
        }

        .form-group form select {
            width: 100%;
            padding: 10px;
        }

        .alert {
            background: #d1928e;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
        }
    </style>
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

    <div class="form-group">
        <form action="{{ route('store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="nombre_tarea" class="form-label">Tarea</label>
                <input type="text" class="form-control" name="nombre_tarea" id="nombre_tarea" placeholder="Nombre de tarea">
            </div>

            <div class="mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento</label>
                <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento">
            </div>

            <div class="mb-3">
                <label for="hora_vencimiento" class="form-label">Hora de vencimiento</label>
                <input type="time" class="form-control" name="hora_vencimiento" id="hora_vencimiento">
            </div>

            <div class="mb-3">
                <label for="prioridad" class="form-label">Prioridad</label>
                <select class="form-select" name="prioridad" id="prioridad">
                    <option value="">Seleccionar prioridad</option>
                    <option value="Alta">&#xf062; Alta</option>
                    <option value="Media">&#xf061; Media</option>
                    <option value="Baja">&#xf063; Baja</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Agregar Tarea">
            </div>
        </form>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
