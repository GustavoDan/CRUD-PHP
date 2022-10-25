<?php
if (!isset($confirm_dialog)) $confirm_dialog = false ?>

<div class="modal fade text-light" id="<?php echo $modal_id ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-light">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <h5 class="modal-title"><?php echo isset($r_contato) ? $r_contato["nome"] : "Criar Contato" ?></h5>

                <button class="btn-close btn-close-white modal-close-button" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center gap-3 p-5 m-0">
                    <?php include ($operation == "delete" ? $operation : $modal) . '.php' ?>
                </div>

                <div class="modal-footer d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn <?php echo $confirm_dialog ? "btn-success" : "btn-primary" ?>" name="<?php echo $modal . "/" . $operation ?>"><?php echo $confirm_dialog ? "Sim" : "Salvar" ?></button>
                    <button type="button" class="btn <?php echo $confirm_dialog ? "btn-danger" : "btn-secondary" ?>" data-bs-dismiss="modal"><?php echo $confirm_dialog ? "Não" : "Fechar" ?></button>
                </div>
            </form>
        </div>
    </div>
</div>