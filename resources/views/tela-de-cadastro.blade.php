<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite('resources/css/autenticacao.css')
    <title>Meu Bolso - Cadastro</title>
</head>

<body>
    <div class="login-layout">
        <div class="lado-esquerdo">
            <img src="{{ asset('imagens/meu-bolso.png') }}" alt="Meu Bolso">
        </div>

        <div class="lado-direito">
            <div class="login-box">
                <div class="logo">
                    <i class="bi bi-wallet2"></i> Meu <span>Bolso</span>
                </div>

                <h1>Criar conta</h1>
                <p class="subtitulo">Cadastre-se para acompanhar sua vida financeira.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('cadastro.store') }}">
                    @csrf

                    <div class="campo">
                        <label for="name">Nome</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            placeholder="Digite seu nome" required>
                    </div>

                    <div class="campo">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="campo">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password"
                            placeholder="Crie uma senha" minlength="4" required>
                    </div>

                    <div class="campo">
                        <label for="password_confirmation">Confirmar senha</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Digite a senha novamente" minlength="4" required>
                    </div>

                    <button type="submit" class="btn-entrar">Criar conta</button>
                    <a href="{{ route('login') }}" class="btn-criar">Já tenho uma conta</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
