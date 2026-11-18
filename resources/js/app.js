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
    document.getElementById('modal').classList.add('aberto');
}

// FECHAR MODAL
function fecharModal() {
    document.getElementById('modal').classList.remove('aberto');
}

// CALCULAR SALDO
function calcularSaldo() {

    let renda = Number(document.getElementById('rendas').value) || 0;

    let despesa = Number(document.getElementById('despesas').value) || 0;

    let saldo = renda - despesa;

    let restante = Math.max(saldo, 0);

    document.getElementById('saldo').innerHTML = moeda(saldo);

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
document.getElementById('rendas').addEventListener('input', calcularSaldo);

document.getElementById('despesas').addEventListener('input', calcularSaldo);

// CADASTRAR DESPESA
document.getElementById('formDespesa').addEventListener('submit', function (event) {

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

// ALTERNAR TEMA
document.getElementById('tema').addEventListener('click', function () {

    document.body.classList.toggle('claro');

    this.textContent = document.body.classList.contains('claro')
        ? 'Tema escuro'
        : 'Tema claro';

});

// CALCULAR AO ABRIR
calcularSaldo();
