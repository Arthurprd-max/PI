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