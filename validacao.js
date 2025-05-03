// Valida formato de e-mail
function validarEmail(email) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return regex.test(email);
}

// Valida formato de CNPJ simples (14 dígitos numéricos)
function validarCNPJ(cnpj) {
    const regex = /^\d{14}$/;
    return regex.test(cnpj.replace(/[^\d]+/g, ""));
}

// Valida formato de telefone simples (11 dígitos com DDD)
function validarTelefone(telefone) {
    const regex = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;
    return regex.test(telefone);
}

// Valida todos os campos
function validarFormulario() {
    const nome = document.getElementById("nome").value.trim();
    const cnpj = document.getElementById("cnpj").value.trim();
    const telefone = document.getElementById("telefone").value.trim();
    const email = document.getElementById("email").value.trim();

    if (nome === "") {
        alert("O campo Nome é obrigatório.");
        return false;
    }

    if (cnpj === "" || !validarCNPJ(cnpj)) {
        alert("Insira um CNPJ válido (apenas números, 14 dígitos).");
        return false;
    }

    if (telefone === "" || !validarTelefone(telefone)) {
        alert("Insira um telefone válido. Ex: (11) 90000-0000");
        return false;
    }

    if (email === "" || !validarEmail(email)) {
        alert("Insira um e-mail válido.");
        return false;
    }

    return true; // Envia o formulário se tudo estiver OK
}
