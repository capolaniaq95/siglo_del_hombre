<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .full-height {
            height: 100vh;
        }

        .image-container {
            background: url('./images/siglo del hombre logo.png') no-repeat center center;
            background-size: cover;
            height: 100%;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .left-half {
            width: 40%;
        }

        .right-half {
            width: 60%;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex p-0 full-height">
        <div class="left-half image-container"></div>
        <div class="right-half d-flex align-items-center justify-content-center">
            <div class="form-container">
<form action="ingreso.php" method="POST">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Tipo de Usuario</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="gridRadios1" value="Administrador" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Administrador
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rol" id="gridRadios2" value="Cliente">
                    <label class="form-check-label" for="gridRadios2">
                        Cliente
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-info" value="Ingresar">Ingresar</button>
        </div>
    </div>
</form>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-info" onclick="window.location.href='registro.php'">Registrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>