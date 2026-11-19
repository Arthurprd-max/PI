<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite('resources/css/autenticacao.css')
    <title>Meu Bolso - Login</title>

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

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div class="campo">
                        <label>E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="campo">
                        <label>Senha</label>
                        <input type="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="lembrar">
                        <label>
                            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                            Lembrar de mim
                        </label>

                        <a href="#">Esqueceu a senha?</a>
                    </div>


                    <button type="submit" class="btn-entrar">
                        Entrar
                    </button>

                    <a href="{{ route('cadastro') }}" class="btn-criar">
                        Criar nova conta
                    </a>

                </form>



            </div>

        </div>

    </div>

</body>

</html>