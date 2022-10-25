<?php
$estados = null;

function get_estados()
{
    global $estados;

    if ($estados) {
        return $estados;
    }

    $response = file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
    $estados = json_decode($response, true);
    usort($estados, function ($item1, $item2) {
        return $item1['nome'] <=> $item2['nome'];
    });

    return $estados;
}
?>

<script>
    var estados_cidades = {}

    async function get_cidades(estado_sigla) {
        if (!estados_cidades[`${estado_sigla}`]) {
            await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estado_sigla}/municipios`)
                .then((response) => response.json())
                .then((data) => estados_cidades[`${estado_sigla}`] = data);
        }

        return estados_cidades[`${estado_sigla}`]
    }
</script>