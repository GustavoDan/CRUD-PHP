<div class="d-flex justify-content-center align-items-center gap-3 w-100">

    <input type="hidden" name="id" value="<?php echo $operation == "create" ? $r_contato['id'] : $r_telefone["id"] ?>">

    <div class="form-floating col-9">
        <input class="form-control" name="telefone" placeholder="Digite o telefone." value="<?php echo $operation == "edit" ? $r_telefone["telefone"] : "" ?>">
        <label for="telefone" class="text-secondary text-start">Telefone</label>
    </div>

    <div class="form-floating col-3">
        <select class="form-select" name="perfil">
            <option selected></option>
            <option value="Pessoal" <?php if ($r_telefone["perfil"] == 'Pessoal'  && $operation == 'edit') echo 'selected' ?>>Pessoal</option>
            <option value="Profissional" <?php if ($r_telefone["perfil"] == 'Profissional'  && $operation == 'edit') echo 'selected' ?>>Profissional</option>
        </select>
        <label for="perfil" class="text-secondary text-start">Perfil</label>
    </div>
</div>