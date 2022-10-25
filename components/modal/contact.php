<div class="d-flex justify-content-center align-items-center gap-3 w-100">
    <?php if ($operation == "edit") echo '<input type="hidden" name="id" value="' . $r_contato["id"] . '">' ?>

    <div class="form-floating col-10">
        <input class="form-control" name="nome" value="<?php echo $operation == "create" ? "" : $r_contato["nome"]; ?>" placeholder="Digite o nome completo.">
        <label for="nome" class="text-secondary text-start">Nome</label>
    </div>

    <div class="form-floating col-2">
        <input type="number" class="form-control" name="idade" value="<?php echo $operation == "create" ? "" : $r_contato["idade"]; ?>" placeholder="Digite a idade.">
        <label for="idade" class="text-secondary text-start">Idade</label>
    </div>
</div>