import './bootstrap';
function editarRenda() {
    const elemento = document.getElementById("renda");

    const valorAtual = elemento.innerText
        .replace("R$", "")
        .trim()
        .replace(".", "")
        .replace(",", ".");

    elemento.innerHTML = `
    <input
    id="novoValor"
    type="number"
    value="${valorAtual}"
    >
    <button onclick="salvarRenda()">/</button>
    <button onclick="cancelarREnda()">/</button>
    `;
}

// FORMATAR DINHEIRO
function moeda(valor) {
    return valor.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
}

// ABRIR MODAL
function abrirModal() {
    const modal = document.getElementById('modal');
    if (modal) {
        modal.classList.add('aberto');
    }
}

// FECHAR MODAL
function fecharModal() {
    const modal = document.getElementById('modal');
    if (modal) {
        modal.classList.remove('aberto');
    }

    const modalRenda = document.getElementById('modalRenda');
    if (modalRenda && window.bootstrap) {
        const instanciaRenda = bootstrap.Modal.getInstance(modalRenda)
            || bootstrap.Modal.getOrCreateInstance(modalRenda);
        instanciaRenda.hide();
    }

    const modalBootstrap = document.getElementById('exampleModal');
    if (modalBootstrap && window.bootstrap) {
        const instancia = bootstrap.Modal.getInstance(modalBootstrap)
            || bootstrap.Modal.getOrCreateInstance(modalBootstrap);
        instancia.hide();
    }
}

// CALCULAR SALDO
function calcularSaldo() {

    const rendaInput = document.getElementById('rendas');
    const despesaInput = document.getElementById('despesas');
    if (!rendaInput || !despesaInput) {
        return;
    }

    let renda = Number(rendaInput.value) || 0;
    let despesa = Number(despesaInput.value) || 0;

    let saldo = renda - despesa;

    let restante = Math.max(saldo, 0);

    document.getElementById('saldo').innerHTML = moeda(saldo);
    document.dispatchEvent(new CustomEvent('saldo-financeiro-atualizado', {
        detail: { saldo }
    }));

    document.getElementById('dinheiroRestante').innerHTML = moeda(restante);

    // DIVIDIR DINHEIRO
    let sos = restante * 0.40;
    let investimento = restante * 0.35;
    let lazer = restante * 0.25;

    // MOSTRAR VALORES
    document.getElementById('valorSOS').innerHTML = moeda(sos);

    document.getElementById('valorInvestimento').innerHTML = moeda(investimento);

    document.getElementById('valorLazer').innerHTML = moeda(lazer);
}

// ATUALIZAR VALORES
const rendaInput = document.getElementById('rendas');
const despesaInput = document.getElementById('despesas');
if (rendaInput) {
    rendaInput.addEventListener('input', calcularSaldo);
}
if (despesaInput) {
    despesaInput.addEventListener('input', calcularSaldo);
}

// CADASTRAR RENDA
const formRenda = document.getElementById('formRenda');
if (formRenda) {
    formRenda.addEventListener('submit', function (event) {
        event.preventDefault();

        const valor = Number(document.getElementById('valorRenda').value);
        if (valor <= 0) {
            alert('Digite um valor válido!');
            return;
        }

        fetch(formRenda.action, {
            method: 'POST',
            body: new FormData(formRenda),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function (response) {
            if (!response.ok) {
                throw new Error('Não foi possível cadastrar a renda.');
            }

            const rendaAtual = Number(document.getElementById('rendas').value) || 0;
            document.getElementById('rendas').value = rendaAtual + valor;
            calcularSaldo();
            formRenda.reset();
            document.getElementById('dataRenda').value = new Date().toISOString().slice(0, 10);
            fecharModal();
        }).catch(function () {
            alert('Não foi possível cadastrar a renda.');
        });
    });
}

// CADASTRAR DESPESA
const formDespesa = document.getElementById('formDespesa');
if (formDespesa) {
    formDespesa.addEventListener('submit', function (event) {

    event.preventDefault();

    let nome = document.getElementById('nomeDespesa').value;

    let valor = Number(document.getElementById('valorDespesa').value);

    let data = document.getElementById('dataDespesa').value;

    let categoria = document.getElementById('categoriaDespesa').value;

    if (valor <= 0) {
        alert('Digite um valor válido!');
        return;
    }

    // SOMAR DESPESA
    let despesas = Number(document.getElementById('despesas').value) || 0;

    document.getElementById('despesas').value = despesas + valor;

    // REMOVER MENSAGEM VAZIA
    let mensagem = document.getElementById('mensagemVazia');

    if (mensagem) {
        mensagem.remove();
    }

    // CRIAR ITEM
    let lista = document.getElementById('listaDespesas');

    let item = document.createElement('div');

    item.className = 'despesa-item';

    let linha = document.createElement('div');

    linha.className = 'linha';

    let descricao = document.createElement('span');

    descricao.textContent = nome + ' - ' + categoria;

    let preco = document.createElement('strong');

    preco.textContent = moeda(valor);

    linha.appendChild(descricao);
    linha.appendChild(preco);

    let dataTexto = document.createElement('small');

    dataTexto.className = 'secundario';

    dataTexto.textContent = 'Data: ' + data.split('-').reverse().join('/');

    item.appendChild(linha);
    item.appendChild(dataTexto);

    lista.appendChild(item);

    // ATUALIZAR SALDO
    calcularSaldo();

    // LIMPAR FORMULÁRIO
    document.getElementById('formDespesa').reset();

    // FECHAR MODAL
    fecharModal();
    });
}

// CALCULAR AO ABRIR
calcularSaldo();
