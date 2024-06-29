<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php session_start(); print_r($_SESSION) ?>
        BIENVENIDO
    </h1>
    <p>
        <form action="/logout" method="get">
            <button type="submit">
                Cerrar sesion
            </button>
        </form>
    </p>
</body>
</html>