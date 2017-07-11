
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summit Intranet | Restablecer password</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body id="login" class="background-login">
    <div class="login-container">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <a href="/login" class="logo-login-wrapper">
            <img src="/images/logo.png" alt="">
        </a>
        <p class="default-text">Ingrese sus datos de usuario para ingresar al sistema</p>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" value="{{$token}}" name="token">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
            </div>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong style="color: white">
                    Las credenciales son invalidas, o el usuario no esta activo.
                </strong>
            </span>
            @endif
            
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Password" required>
            </div>
            <div class="button-send">
                <button type="submit" class="btn btn-warning danger-alternative">RESTABLECER</button>
            </div>
        </form>
        <p class="default-text" style="padding-bottom: 0">Si aún no tienes cuenta, registrate haciendo <a href="/register" style="color:white;text-decoration:underline">click aquí</a></p>

        <p class="default-text copy">© Copyright Summit Agro 2017</p>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>