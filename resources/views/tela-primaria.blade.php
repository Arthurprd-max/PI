<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="{{ session('tema', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Meu Bolso</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body id="inicio-pagina">

    <div class="container-fluid">

        <div class="row">

            <!-- MENU -->
            <div class="col-md-2 menu">

                <h4 class="mb-4 text-#172554">
                    <i class="bi bi-wallet2"></i> Meu <span class="text-success">Bolso</span>
                </h4>

                <a href="#inicio-pagina">
                    <i class="bi bi-house"></i> Início
                </a>

                <a href="#resumo-despesas">
                    <i class="bi bi-card-list"></i> Resumo
                </a>

                <a href="{{ route('tema') }}">
                    <i class="bi bi-circle-half"></i> Alternar tema
                </a>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link menu-sair">
                        <i class="bi bi-box-arrow-left"></i> Sair
                    </button>
                </form>

            </div>


            <!-- PAINEL -->
            <div class="col-md-10 p-4 painel-principal">

                <!-- CABEÇALHO -->
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                    <div>
                        <h2 class="fw-bold">Olá, Cliente!</h2>

                        <p class="text-secondary">
                            Veja como está sua vida financeira.
                        </p>
                    </div>

                    <button type="button" class="btn btn-success botao-nova-despesa" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">

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


                </div>


                <div class="cartao-meta">

                    <div class="meta-cabecalho d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">🎯 Minhas Metas</h5>
                            <small>Acompanhe seus objetivos financeiros</small>
                        </div>

                        <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#modalNovaMeta">
                            + Nova meta
                        </button>
                    </div>

                    <div class="meta-conteudo">

                        <!-- SALDO -->
                        <div class="meta-saldo mb-4">
                            <small>Saldo disponível</small>
                            <h3 id="saldoDisponivel">R$ 0,00</h3>
                        </div>

                        <!-- META -->
                        <div id="listaMetas">

                            <div class="meta-item">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="meta-titulo mb-1">
                                        Minha primeira meta
                                    </h5>

                                    <span class="meta-percentual">0%</span>
                                </div>

                                <p class="meta-valor">
                                    <span class="valorGuardado">R$ 0,00</span>
                                    /
                                    <span class="valorObjetivo">R$ 0,00</span>
                                </p>

                                <div class="meta-progresso">
                                    <div class="progress-bar" style="width: 0%"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <small>Valor guardado</small>
                                    <strong class="valorGuardado">R$ 0,00</strong>
                                </div>

                                <button class="btn btn-success w-100 mt-3" onclick="abrirTransferencia(0)">
                                    Guardar dinheiro
                                </button>

                            </div>

                        </div>

                    </div>
                </div>


                <!-- MODAL NOVA META -->
                <div class="modal fade" id="modalNovaMeta" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Criar nova meta</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <label class="form-label">Nome da meta</label>
                                <input type="text" id="nomeMeta" class="form-control mb-3"
                                    placeholder="Ex: Comprar uma moto">

                                <label class="form-label">Valor desejado</label>
                                <input type="number" id="objetivoMeta" class="form-control" placeholder="0,00"
                                    min="0.01" step="0.01">

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>

                                <button class="btn btn-success" onclick="criarMeta()">
                                    Criar meta
                                </button>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- MODAL TRANSFERÊNCIA -->
                <div class="modal fade" id="modalTransferencia" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Guardar dinheiro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <p>Saldo disponível:</p>

                                <h4 id="saldoModal">R$ 0,00</h4>

                                <label class="form-label mt-3">
                                    Quanto deseja transferir?
                                </label>

                                <input type="number" id="valorTransferencia" class="form-control" placeholder="0,00"
                                    min="0.01" step="0.01">

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>

                                <button class="btn btn-success" onclick="transferirDinheiro()">
                                    Confirmar transferência
                                </button>
                            </div>

                        </div>
                    </div>
                </div>


                <script>
                let saldo = 0;

                let metas = [{
                    nome: 'Minha primeira meta',
                    objetivo: 0,
                    guardado: 0
                }];

                let metaSelecionada = 0;

                function dinheiro(valor) {
                    return Number(valor).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                }

                function atualizarSaldo() {
                    document.getElementById('saldoDisponivel').textContent =
                        dinheiro(saldo);
                }

                function renderizarMetas() {

                    const lista = document.getElementById('listaMetas');

                    lista.innerHTML = '';

                    metas.forEach((meta, index) => {

                        const porcentagem = meta.objetivo > 0 ?
                            Math.min((meta.guardado / meta.objetivo) * 100, 100) :
                            0;

                        lista.innerHTML += `
            <div class="meta-item mb-4">

                <div class="d-flex justify-content-between">
                    <h5 class="meta-titulo">${meta.nome}</h5>

                    <strong class="meta-percentual">
                        ${porcentagem.toFixed(0)}%
                    </strong>
                </div>

                <p class="meta-valor">
                    ${dinheiro(meta.guardado)}
                    /
                    ${dinheiro(meta.objetivo)}
                </p>

                <div class="meta-progresso">
                    <div class="progress-bar"
                         style="width: ${porcentagem}%">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <small>Guardado</small>
                    <strong>${dinheiro(meta.guardado)}</strong>
                </div>

                <button class="btn btn-success w-100 mt-3"
                        onclick="abrirTransferencia(${index})">
                    Guardar dinheiro
                </button>

            </div>
        `;

                    });

                    atualizarSaldo();
                }

                function criarMeta() {

                    const nome = document.getElementById('nomeMeta').value.trim();

                    const objetivo = Number(
                        document.getElementById('objetivoMeta').value
                    );

                    if (!nome || !Number.isFinite(objetivo) || objetivo <= 0) {
                        alert('Preencha o nome e um valor válido para a meta.');
                        return;
                    }

                    metas.push({
                        nome: nome,
                        objetivo: objetivo,
                        guardado: 0
                    });

                    document.getElementById('nomeMeta').value = '';
                    document.getElementById('objetivoMeta').value = '';

                    bootstrap.Modal.getInstance(
                        document.getElementById('modalNovaMeta')
                    ).hide();

                    renderizarMetas();
                }

                function abrirTransferencia(index) {

                    metaSelecionada = index;

                    document.getElementById('saldoModal').textContent =
                        dinheiro(saldo);

                    document.getElementById('valorTransferencia').value = '';

                    bootstrap.Modal.getOrCreateInstance(
                        document.getElementById('modalTransferencia')
                    ).show();
                }

                function transferirDinheiro() {

                    const valor = Number(
                        document.getElementById('valorTransferencia').value
                    );

                    if (!Number.isFinite(valor) || valor <= 0) {
                        alert('Digite um valor válido.');
                        return;
                    }

                    if (valor > saldo) {
                        alert('Você não possui saldo suficiente.');
                        return;
                    }

                    const meta = metas[metaSelecionada];

                    if (meta.guardado + valor > meta.objetivo) {
                        alert('Esse valor ultrapassa o objetivo da meta.');
                        return;
                    }

                    saldo -= valor;

                    meta.guardado += valor;

                    bootstrap.Modal.getInstance(
                        document.getElementById('modalTransferencia')
                    ).hide();

                    renderizarMetas();

                    alert('Transferência realizada com sucesso!');
                }

                renderizarMetas();
                </script>

                <!-- RESUMO DAS DESPESAS -->
                <div class="cartao mb-4" id="resumo-despesas">

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

    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>