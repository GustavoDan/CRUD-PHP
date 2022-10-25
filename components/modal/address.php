<input type="hidden" name="id" value="<?php echo $operation == "create" ? $r_contato['id'] : $r_endereco["id"] ?>">

<div class="d-flex justify-content-center align-items-center gap-3 w-100">

    <div class="form-floating col-6">
        <select class="form-select" name="estado" onChange="populate_cidades(this)">
            <option></option>
            <?php
            include_once "locations/ibge_api.php";
            $estados = get_estados();
            foreach ($estados as &$estado) {
            ?>
                <option value="<?php echo $estado["sigla"] ?>"><?php echo $estado["nome"] ?></option>
            <?php } ?>
        </select>
        <label for="estado" class="text-secondary text-start">Estado</label>
    </div>

    <div class="form-floating col-6">
        <select class="form-select" name="cidade">
            <option></option>
        </select>
        <label for="cidade" class="text-secondary text-start">Cidade</label>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center gap-3 w-100">

    <div class="form-floating col-6">
        <input class="form-control" name="bairro" value="<?php echo $operation == "create" ? "" : $r_endereco["bairro"]; ?>" placeholder="Digite o bairro.">
        <label for="bairro" class="text-secondary text-start">Bairro</label>
    </div>

    <div class="form-floating col-6">
        <input class="form-control" name="rua" value="<?php echo $operation == "create" ? "" : $r_endereco["rua"]; ?>" placeholder="Digite a rua.">
        <label for="rua" class="text-secondary text-start">Rua</label>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center gap-2 w-100">

    <div class="form-floating col-2">
        <input class="form-control" name="numero" value="<?php echo $operation == "create" ? "" : $r_endereco["numero"]; ?>" placeholder="Digite o número.">
        <label for="numero" class="text-secondary text-start">Número</label>
    </div>

    <div class="form-floating col-5">
        <input class="form-control" name="complemento" value="<?php echo $operation == "create" ? "" : $r_endereco["complemento"]; ?>" placeholder="Digite o complemento.">
        <label for="complemento" class="text-secondary text-start">Complemento</label>
    </div>
    <div class="form-floating col-5">
        <input class="form-control" name="observacao" value="<?php echo $operation == "create" ? "" : $r_endereco["observacao"]; ?>" placeholder="Digite uma observação.">
        <label for="observacao" class="text-secondary text-start">Observação</label>
    </div>
</div>