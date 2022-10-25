<div class="d-flex justify-content-center align-items-center gap-3 w-100">

    <input type="hidden" name="id" value="<?php echo $operation == "create" ? $r_contato['id'] : $r_email["id"] ?>">

    <div class="form-floating col-9">
        <input type="text" class="form-control" name="email" placeholder="Digite o email." value="<?php echo $operation == "edit" ? $r_email["email"] : "" ?>">
        <label for="email" class="text-secondary text-start">Email</label>
    </div>

    <div class="form-floating col-3">
        <select class="form-select" name="perfil">
            <option selected></option>
            <option value="Pessoal" <?php if ($r_email["perfil"] == 'Pessoal' && $operation == 'edit') echo 'selected' ?>>Pessoal</option>
            <option value="Profissional" <?php if ($r_email["perfil"] == 'Profissional'  && $operation == 'edit') echo 'selected' ?>>Profissional</option>
        </select>
        <label for="perfil" class="text-secondary text-start">Perfil</label>
    </div>
</div>