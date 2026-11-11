<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Meu Bolso</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite('resources/js/app.js')

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!-- MENU -->
            <div class="col-md-2 menu">

                <h4 class="verde mb-4">
                    <i class="bi bi-wallet2"></i> Meu Bolso
                </h4>

                <a href="#" class="ativo">
                    <i class="bi bi-house"></i> Início
                </a>


                <a href="#">
                    <i class="bi bi-bullseye"></i> configuração
                </a>


                <a href="#">
                    <i class="bi bi-box-arrow-left"></i> Sair
                </a>

            </div>


            <!-- PAINEL -->
            <div class="col-md-10 p-4">

                <!-- CABEÇALHO -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                    <div>
                        <h2 class="fw-bold">Olá, Cliente!</h2>

                        <p class="text-secondary">
                            Veja como está sua vida financeira.
                        </p>
                    </div>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">

                        <i class="bi bi-plus-circle"></i> Nova despesa

                    </button>

                </div>


                <!-- MODAL DE DESPESA -->
                <div class="modal fade" id="exampleModal" tabindex="-1">

                    <div class="modal-dialog modal-dialog-centered">

                        <form id="formDespesa" class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title">
                                    Cadastrar despesa
                                </h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Nome da despesa
                                    </label>

                                    <input type="text" id="nomeDespesa" class="form-control"
                                        placeholder="Ex: Conta de luz" required>

                                </div>


                                <div class="mb-3">

                                    <label class="form-label">
                                        Valor
                                    </label>

                                    <input type="number" id="valorDespesa" class="form-control" placeholder="R$ 0,00"
                                        min="0.01" step="0.01" required>

                                </div>


                                <div class="mb-3">

                                    <label class="form-label">
                                        Data
                                    </label>

                                    <input type="date" id="dataDespesa" class="form-control" required>

                                </div>


                                <div class="mb-3">

                                    <label class="form-label">
                                        Categoria
                                    </label>

                                    <select id="categoriaDespesa" class="form-select" required>

                                        <option value="">Selecione</option>
                                        <option>Alimentação</option>
                                        <option>Moradia</option>
                                        <option>Transporte</option>
                                        <option>Saúde</option>
                                        <option>Outros</option>

                                    </select>

                                </div>

                            </div>


                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">

                                    Cancelar

                                </button>

                                <button type="submit" class="btn btn-success">

                                    Salvar despesa

                                </button>

                            </div>

                        </form>

                    </div>

                </div>


                <!-- VALORES -->
                <div class="row g-3 mb-4">


                    <!-- RENDAS -->
                    <div class="col-md-4">

                        <div class="cartao">

                            <i class="bi bi-arrow-up-circle-fill verde"></i>

                            Rendas

                            <input type="number" id="rendas" class="form-control mt-2" value="0" min="0" step="0.01">

                        </div>

                    </div>


                    <!-- DESPESAS -->
                    <div class="col-md-4">

                        <div class="cartao">

                            <i class="bi bi-arrow-down-circle-fill vermelho"></i>

                            Despesas

                            <input type="number" id="despesas" class="form-control mt-2" value="0" min="0" step="0.01">

                        </div>

                    </div>


                    <!-- SALDO -->
                    <div class="col-md-4">

                        <div class="cartao">

                            <i class="bi bi-wallet-fill azul"></i>

                            Saldo

                            <div class="valor azul mt-2" id="saldo">
                                R$ 0,00
                            </div>

                        </div>

                    </div>

                </div>


                <!-- DISTRIBUIÇÃO DO DINHEIRO -->
                <div class="cartao mb-4">

                    <h5 class="fw-bold mb-2">

                        <i class="bi bi-pie-chart-fill verde"></i>
                        Distribuição do dinheiro

                    </h5>

                    <p class="text-secondary">
                        Veja como seu dinheiro restante será dividido.
                    </p>

                    <h3 class="fw-bold verde mb-4" id="dinheiroRestante">
                        R$ 0,00
                    </h3>


                    <!-- BARRA GERAL -->
                    <div class="progress mb-4" style="height: 15px;">

                        <div class="progress-bar bg-success" style="width: 40%"></div>

                        <div class="progress-bar bg-primary" style="width: 35%"></div>

                        <div class="progress-bar bg-warning" style="width: 25%"></div>

                    </div>


                    <!-- SOS -->
                    <div class="mb-3">

                        <div class="d-flex justify-content-between">

                            <strong>Reserva SOS (40%)</strong>

                            <strong id="valorSOS">R$ 0,00</strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar bg-success" style="width: 40%"></div>

                        </div>

                    </div>


                    <!-- INVESTIMENTOS -->
                    <div class="mb-3">

                        <div class="d-flex justify-content-between">

                            <strong>Investimentos (35%)</strong>

                            <strong id="valorInvestimento">R$ 0,00</strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar bg-primary" style="width: 35%"></div>

                        </div>

                    </div>


                    <!-- LAZER -->
                    <div class="mb-3">

                        <div class="d-flex justify-content-between">

                            <strong>Lazer (25%)</strong>

                            <strong id="valorLazer">R$ 0,00</strong>

                        </div>

                        <div class="progress">

                            <div class="progress-bar bg-warning" style="width: 25%"></div>

                        </div>

                    </div>




                    <!-- RESUMO DAS DESPESAS -->
                    <div class="cartao mb-4">

                        <h5 class="fw-bold mb-3">
                            Resumo das despesas
                        </h5>

                        <div id="listaDespesas">

                            <p class="text-secondary" id="mensagemVazia">
                                Nenhuma despesa cadastrada.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- JAVASCRIPT DO SISTEMA -->
    <script>
        // FORMATAR DINHEIRO
        function moeda(valor) {

            return valor.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });

        }


        // CALCULAR SALDO E DISTRIBUIÇÃO
        function calcularSaldo() {

            let renda = Number(document.getElementById('rendas').value) || 0;

            let despesa = Number(document.getElementById('despesas').value) || 0;

            let saldo = renda - despesa;

            let restante = Math.max(saldo, 0);


            // MOSTRAR SALDO
            document.getElementById('saldo').innerHTML = moeda(saldo);


            // MOSTRAR DINHEIRO RESTANTE
            document.getElementById('dinheiroRestante').innerHTML = moeda(restante);


            // DIVIDIR O DINHEIRO
            let sos = restante * 0.40;

            let investimento = restante * 0.35;

            let lazer = restante * 0.25;


            // MOSTRAR DIVISÃO
            document.getElementById('valorSOS').innerHTML = moeda(sos);

            document.getElementById('valorInvestimento').innerHTML = moeda(investimento);

            document.getElementById('valorLazer').innerHTML = moeda(lazer);

        }


        // ATUALIZAR QUANDO ALTERAR OS VALORES
        document.getElementById('rendas').addEventListener('input', calcularSaldo);

        document.getElementById('despesas').addEventListener('input', calcularSaldo);


        // CADASTRAR NOVA DESPESA
        document.getElementById('formDespesa').addEventListener('submit', function(event) {

            event.preventDefault();


            // PEGAR OS DADOS
            let nome = document.getElementById('nomeDespesa').value;

            let valor = Number(document.getElementById('valorDespesa').value);

            let data = document.getElementById('dataDespesa').value;

            let categoria = document.getElementById('categoriaDespesa').value;


            // VERIFICAR VALOR
            if (valor <= 0) {

                alert('Digite um valor válido!');

                return;

            }


            // SOMAR DESPESA
            let despesas = Number(document.getElementById('despesas').value) || 0;

            document.getElementById('despesas').value = despesas + valor;


            // REMOVER MENSAGEM DE LISTA VAZIA
            let mensagem = document.getElementById('mensagemVazia');

            if (mensagem) {
                mensagem.remove();
            }


            // CRIAR NOVA DESPESA
            let lista = document.getElementById('listaDespesas');

            let item = document.createElement('div');

            item.className = 'mb-3';


            // NOME E VALOR
            let linha = document.createElement('div');

            linha.className = 'd-flex justify-content-between';

            let descricao = document.createElement('span');

            descricao.innerHTML = nome + ' - ' + categoria;

            let preco = document.createElement('strong');

            preco.innerHTML = moeda(valor);

            linha.appendChild(descricao);

            linha.appendChild(preco);


            // DATA
            let dataTexto = document.createElement('small');

            dataTexto.className = 'text-secondary';

            dataTexto.innerHTML = 'Data: ' + data.split('-').reverse().join('/');


            // ADICIONAR NA LISTA
            item.appendChild(linha);

            item.appendChild(dataTexto);

            lista.appendChild(item);


            // ATUALIZAR SALDO E DISTRIBUIÇÃO
            calcularSaldo();


            // LIMPAR FORMULÁRIO
            document.getElementById('formDespesa').reset();


            // FECHAR MODAL
            bootstrap.Modal.getOrCreateInstance(
                document.getElementById('exampleModal')
            ).hide();

        });


        // CALCULAR AO ABRIR A PÁGINA
        calcularSaldo();
    </script>

</body>

</html>