if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

async function populate_cidades(input) {
    let cidades = await get_cidades(input.value);
    let select = input.parentNode.parentNode.querySelector('[name="cidade"]');

    select.innerHTML = "<option></option>";

    cidades.forEach((cidade) => {
        let option = document.createElement("option");
        option.value = cidade.nome;
        option.innerText = cidade.nome;

        select.append(option);
    });
}

async function set_endereco_selects(link, estado, cidade) {
    let div_id = link.getAttribute("data-bs-target");

    var estado_select = document.querySelector(`${div_id} [name="estado"]`);
    var cidade_select = document.querySelector(`${div_id} [name="cidade"]`);

    estado_select.value = estado;
    await populate_cidades(estado_select);
    cidade_select.value = cidade;
}
