<!DOCTYPE html>
<html lang="pt-br" data-tema="{{ session('tema', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Meu Bolso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!-- MENU -->
            <div class="col-md-2 menu" style="background-color: #102840;">

                <h4 class="mb-4 text-white">
                    <i class="bi bi-wallet2"></i> Meu <span class="text-success">Bolso</span>
                </h4>

                <a href="#" class="ativo" style="color: #FFD700;">
                    <i class="bi bi-house"></i> Início
                </a>


                <a href="#" style="color: #FFD700;">
                    <i class="bi bi-bullseye"></i> configuração
                </a>


                <a href="#" style="color: #FF0000;">
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




</body>

</html>