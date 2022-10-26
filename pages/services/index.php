<?php include "../header.php"; ?>
<div class="container">
    <table class="table table-dark table-hover align-middle text-center">
        <thead>
            <tr class="table-active align-middle">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
                <th scope="col">Adicional/Hora</th>
                <th scope="col">Garantia</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $contato = $conexao->prepare("SELECT * FROM servicos where contato_id = :contato_id");
            $contato->bindParam(":contato_id", $_GET["contact_id"], PDO::PARAM_STR);
            $executa = $contato->execute();

            while ($r_contato = $contato->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td>
                        <?php echo $r_contato["id"] ?>
                    </td>

                    <td>
                        <?php echo $r_contato["nome"]; ?>
                    </td>

                    <td><?php echo $r_contato["categoria"]; ?></td>

                    <td>
                        <?php echo $r_contato["valor"]; ?>
                    </td>

                    <td>
                        <?php echo $r_contato["valor_adicional_hora"]; ?>
                    </td>

                    <td>
                        <?php echo $r_contato["garantia"]; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>