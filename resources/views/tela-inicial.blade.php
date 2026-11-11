<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="apenas aprendendo funções basicas do html">
    <meta name="keybords" content="HTML, CSS">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/responsivo.css">
    <title>Aula de HTML e CSS(tags e estilos)</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h1>Meu Bolso</h1>
        </div>
    </nav>
    <header class="header">
        <div class="headline">
            <h2 style="font-size: 20px; letter-spacing: 5px; padding-left: 5px;">Bem vindo ao melhor</h2>
            <h2>Gerenciador de Renda</h2>
            <p>Gerenciar o próprio dinheiro não precisa ser um trabalho difícil. Desenvolvemos a ferramenta perfeita
                para você acompanhar seus ganhos, categorizar seus gastos e visualizar seus investimentos de forma
                rápida e inteligente. Assuma o volante da sua vida financeira agora mesmo.</p>
            <a class="botao" href="{{ route('login') }}">COMECE AGORA</a>
        </div>
        <div class="imgheader">
            <img style="max-width: 90%;" src="imagens/ab5df44c-2cf5-48b2-a772-dbc15e1f29e9.png">
        </div>
        <section>
            <h2>
                O que podemos fazer pelo seu negocio?
            </h2>
            <div class="servisos">
                <div class="card">
                    <img style="margin-top: 5px;" src="imagens/ideia.png">
                    <h3>
                        Dica de Investimentos
                    </h3>
                    <p>Aprenda a fazer seu dinheiro trabalhar por você! Descubra diferentes possibilidades de
                        investimento, conheça conceitos importantes do mercado financeiro e encontre maneiras de fazer
                        seu patrimônio crescer. Tenha acesso a dicas e orientações que ajudam você a investir com mais
                        conhecimento e construir um futuro financeiro melhor.</p>
                </div>
                <div class="card">
                    <img style="margin-top: 5px;" src="imagens/carteira (1).png">
                    <h3>
                        Gerenciamento Finaceiro
                    </h3>
                    <p>
                        Tenha mais controle sobre sua vida financeira! Acompanhe suas receitas, despesas e movimentações
                        em um só lugar. Com uma visão clara do seu dinheiro, fica mais fácil tomar decisões conscientes,
                        evitar gastos desnecessários e alcançar seus objetivos financeiros.
                    </p>
                </div>
                <div class="card">
                    <img style="margin-top: 5px;" src="imagens/organizando.png">
                    <h3>
                        Organização e Controle
                    </h3>
                    <p>
                        Mantenha suas finanças sempre organizadas e sob controle. Planeje seu orçamento mensal,
                        acompanhe seus gastos e identifique para onde seu dinheiro está indo. Com organização e
                        planejamento, você consegue equilibrar suas despesas, economizar mais e ter tranquilidade no day
                        a day.
                    </p>
                </div>
            </div>
        </section>
        <footer>
            <h2>Meu Bolso</h2>
            <p>um site teste, feito com HTML e CSS puro</p>
            <b>©todos direitos reservados</b>
        </footer>
    </header>

</body>

</html>