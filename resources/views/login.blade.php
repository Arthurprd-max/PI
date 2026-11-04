<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        background: #f4f7fb;
    }

    .container {
        display: flex;
        min-height: 100vh;
        width: 100%;
    }

    /* LADO ESQUERDO */
    .lado-esquerdo {
        width: 44%;
        min-height: 100vh;
        overflow: hidden;
    }

    .lado-esquerdo img {
        width: 100%;
        height: 100vh;
        object-fit: cover;
        display: block;
    }

    /* LADO DIREITO */
    .lado-direito {
        width: 56%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
    }

    .login-box {
        background: white;
        width: 100%;
        max-width: 600px;
        padding: 45px;
        border-radius: 15px;
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
        border: 1px solid #d4deeb;
        border-radius: 8px;
        outline: none;
        font-size: 15px;
    }

    .campo input:focus {
        border-color: #08b889;
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
        display: block;
        text-align: center;
        padding: 15px;
        background: #08b889;
        color: white;
        border-radius: 8px;
        text-decoration: none;


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
    }

    /* CELULAR */
    @media (max-width: 800px) {
        .container {
            flex-direction: column;
        }

        .lado-esquerdo {
            width: 100%;
            min-height: auto;
            height: 350px;
        }

        .lado-esquerdo img {
            height: 350px;
        }

        .lado-direito {
            width: 100%;
            padding: 20px;
        }

        .login-box {
            padding: 25px;
        }
    }
    </style>
</head>

<body>

    <div class="container">

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

                <form>

                    <div class="campo">
                        <label>E-mail</label>
                        <input type="email" placeholder="Digite seu e-mail">
                    </div>

                    <div class="campo">
                        <label>Senha</label>
                        <input type="password" placeholder="Digite sua senha">
                    </div>

                    <div class="lembrar">
                        <label>
                            <input type="checkbox">
                            Lembrar de mim
                        </label>

                        <a href="#">Esqueceu a senha?</a>
                    </div>


                    <a href="/tela-primaria" class="btn-entrar">
                        Entrar
                    </a>

                    <a href="#" class="btn-criar">
                        Criar nova conta
                    </a>

                </form>

            </div>

        </div>

    </div>
    ç
</body>

</html>