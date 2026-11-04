<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Meu Bolso - Login</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        min-height: 100vh;
        min-height: 100svh;
        background: #f4f7fb;
    }

    .login-layout {
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
        min-height: 100vh;
        min-height: 100svh;
        width: 100%;
    }

    /* LADO ESQUERDO */
    .lado-esquerdo {
        position: relative;
        min-width: 0;
        min-height: 100vh;
        min-height: 100svh;
        overflow: hidden;
    }

    .lado-esquerdo img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* LADO DIREITO */
    .lado-direito {
        min-width: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(24px, 5vw, 72px);
    }

    .login-box {
        background: white;
        width: 100%;
        max-width: 520px;
        padding: clamp(28px, 4vw, 48px);
        border-radius: 12px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.06);
    }

    .logo {
        text-align: center;
        color: #092c50;
        font-size: 38px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .logo span {
        color: #08b889;
    }

    h1 {
        color: #092c50;
        text-align: center;
        margin-bottom: 10px;
    }

    .subtitulo {
        color: #7b8da8;
        text-align: center;
        margin-bottom: 35px;
    }

    .campo {
        margin-bottom: 20px;
    }

    .campo label {
        display: block;
        color: #34445a;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .campo input {
        width: 100%;
        padding: 15px;
        min-height: 52px;
        border: 1px solid #d4deeb;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 160ms ease, box-shadow 160ms ease;
    }

    .campo input:focus {
        border-color: #08b889;
        outline: 3px solid rgba(8, 184, 137, 0.16);
        outline-offset: 1px;
    }

    .lembrar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        font-size: 14px;
    }

    .lembrar a {
        color: #08b889;
        text-decoration: none;
    }

    .btn-entrar {
        width: 100%;
        display: block;
        text-align: center;
        padding: 15px;
        background: #08b889;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        border: 0;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 160ms ease;
    }

    .btn-entrar:hover {
        background: #079b74;
    }

    .btn-criar {
        display: block;
        text-align: center;
        padding: 15px;
        margin-top: 20px;
        border: 1px solid #08b889;
        border-radius: 8px;
        color: #08b889;
        text-decoration: none;
        transition: background-color 160ms ease, color 160ms ease;
    }

    .btn-criar:hover {
        background: #effbf7;
        color: #067e60;
    }

    /* CELULAR */
    @media (max-width: 800px) {
        .login-layout {
            grid-template-columns: minmax(0, 1fr);
        }

        .lado-esquerdo {
            min-height: auto;
            aspect-ratio: auto;
        }

        .lado-esquerdo img {
            position: static;
            height: auto;
            object-fit: cover;
        }

        .lado-direito {
            padding: 24px 20px 36px;
        }

        .login-box {
            padding: 28px 24px;
        }

        .logo {
            font-size: clamp(28px, 8vw, 34px);
            white-space: nowrap;
        }
    }
    </style>
</head>

<body>

    <div class="login-layout">

        <!-- IMAGEM DO LADO ESQUERDO -->
        <div class="lado-esquerdo">
            <img src="{{ asset('imagens/meu-bolso.png') }}" alt="Meu Bolso">
        </div>

        <!-- FORMULÁRIO DO LADO DIREITO -->
        <div class="lado-direito">

            <div class="login-box">

                <div class="logo">
                    <i class="bi bi-wallet2"></i> Meu <span>Bolso</span>
                </div>

                <h1>Bem-vindo!<i class="bi bi-emoji-smile"></i></h1>

                <p class="subtitulo">
                    Acesse sua conta para acompanhar sua vida financeira.
                </p>

                <form method="POST" action="/login">
                    @csrf
                    <div class="campo">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="Digite seu e-mail">
                    </div>

                    <div class="campo">
                        <label>Senha</label>
                        <input type="password" name="password" placeholder="Digite sua senha">
                    </div>
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="lembrar">
                        <label>
                            <input type="checkbox">
                            Lembrar de mim
                        </label>

                        <a href="#">Esqueceu a senha?</a>
                    </div>


                    <button type="submit" class="btn-entrar">
                        Entrar
                    </button>

                    <a href="#" class="btn-criar">
                        Criar nova conta
                    </a>

                </form>



            </div>

        </div>

    </div>

</body>

</html>