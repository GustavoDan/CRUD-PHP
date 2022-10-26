<?php include "../header.php"; ?>

<div class="container container-dark">
    <?php include "../../database/operations.php" ?>

    <h3 class="mt-3">Lista de clientes</h3>

    <form method="get">
        <div class="input-group mb-3">
            <input class="form-control" name="q" placeholder="Pesquisar nome">
            <button class="btn btn-primary" type="submit" href="">Pesquisar</button>
        </div>
    </form>

    <table class="table table-dark table-hover align-middle text-center">
        <thead>
            <tr class="table-active align-middle">
                <th scope="col"><?php includeFileWithVariables("../../components/add_button.php", [
                                    "modal_id" => "create_contact"
                                ]); ?></th>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Idade</th>
                <th scope="col">Cidade</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (isset($_GET["cliente"]) && isset($_GET["prestador"])) {
                $contato = $conexao->prepare("SELECT * FROM contato WHERE cliente = :cliente and prestador = :prestador");
                $contato->bindParam(":cliente", $_GET["cliente"], PDO::PARAM_STR);
                $contato->bindParam(":prestador", $_GET["prestador"], PDO::PARAM_STR);
            } else if (isset($_GET["q"])) {
                $nome = "%" . $_GET["q"] . "%";
                $contato = $conexao->prepare("SELECT * FROM contato WHERE nome like :nome");
                $contato->bindParam(":nome", $nome, PDO::PARAM_STR);
            } else {
                $contato = $conexao->prepare("SELECT * FROM contato");
            }
            $executa = $contato->execute();

            while ($r_contato = $contato->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td scope="row">
                        <?php includeFileWithVariables("../../components/modal/base.php", [
                            "modal" => "contact",
                            "operation" => "create",
                            "modal_id" => "create_contact"
                        ]) ?>
                    </td>

                    <td scope="row">
                        <a class="btn btn-link text-decoration-none text-warning" href="<?php echo $PAGES_PATH . '/services?contact_id=' . $r_contato["id"] ?>">
                            <?php echo $r_contato["id"] ?>
                        </a>
                    </td>

                    <td>
                        <div class="d-flex align-items-center justify-content-center position-relative">
                            <?php includeFileWithVariables("../../components/edit_link.php", [
                                "modal_id" => "contato_" . $r_contato["id"],
                                "link_text" => $r_contato["nome"]
                            ]);

                            includeFileWithVariables("../../components/delete_button.php", [
                                "modal_id" => "delete_contato_" . $r_contato["id"]
                            ]);
                            ?>
                        </div>

                        <?php includeFileWithVariables("../../components/modal/base.php", [
                            "r_contato" => $r_contato,
                            "modal" => "contact",
                            "operation" => "edit",
                            "modal_id" => "contato_" . $r_contato["id"]
                        ]);

                        includeFileWithVariables("../../components/modal/base.php", [
                            "r_contato" => $r_contato,
                            "modal" => "contact",
                            "operation" => "delete",
                            "delete_id" => $r_contato["id"],
                            "delete_text" => 'o contato "' . $r_contato["nome"] . '"',
                            "modal_id" => "delete_contato_" . $r_contato["id"],
                            "confirm_dialog" => true
                        ]);
                        ?>
                    </td>

                    <td><?php echo $r_contato["idade"]; ?></td>

                    <td><?php
                        $endereco = $conexao->prepare("SELECT * FROM endereco where contato_id = :contato_id");
                        $endereco->bindParam(":contato_id", $r_contato["id"], PDO::PARAM_STR);
                        $executa = $endereco->execute();

                        while ($r_endereco = $endereco->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="d-flex align-items-center justify-content-center position-relative">
                                <?php includeFileWithVariables("../../components/edit_link.php", [
                                    "modal_id" => "endereco_" . $r_endereco["id"],
                                    "link_text" => $r_endereco["cidade"],
                                    "on_click" => "set_endereco_selects(this, '$r_endereco[estado]', '$r_endereco[cidade]')"
                                ]);

                                includeFileWithVariables("../../components/delete_button.php", [
                                    "modal_id" => "delete_endereco_" . $r_endereco["id"]
                                ]);
                                ?>
                            </div>

                        <?php
                            includeFileWithVariables("../../components/modal/base.php", [
                                "r_contato" => $r_contato,
                                "r_endereco" => $r_endereco,
                                "modal" => "address",
                                "operation" => "edit",
                                "modal_id" => "endereco_" . $r_endereco["id"]
                            ]);

                            includeFileWithVariables("../../components/modal/base.php", [
                                "r_contato" => $r_contato,
                                "modal" => "address",
                                "operation" => "delete",
                                "delete_id" => $r_endereco["id"],
                                "delete_text" => 'o endereço "' . $r_endereco["cidade"] . '"',
                                "modal_id" => "delete_endereco_" . $r_endereco["id"],
                                "confirm_dialog" => true
                            ]);
                        }

                        includeFileWithVariables("../../components/add_button.php", [
                            "modal_id" => "add_endereco_contato_" . $r_contato["id"]
                        ]);

                        includeFileWithVariables("../../components/modal/base.php", [
                            "r_contato" => $r_contato,
                            "r_endereco" => $r_endereco,
                            "modal" => "address",
                            "operation" => "create",
                            "modal_id" => "add_endereco_contato_" . $r_contato["id"]
                        ]) ?>
                    </td>

                    <td>
                        <?php
                        $telefone = $conexao->prepare("SELECT * FROM telefone where contato_id = :contato_id");
                        $telefone->bindParam(":contato_id", $r_contato["id"], PDO::PARAM_STR);
                        $executa = $telefone->execute();

                        while ($r_telefone = $telefone->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="d-flex align-items-center justify-content-center position-relative">
                                <?php includeFileWithVariables("../../components/edit_link.php", [
                                    "modal_id" => "telefone_" . $r_telefone["id"],
                                    "link_text" => $r_telefone["telefone"]
                                ]);

                                includeFileWithVariables("../../components/delete_button.php", [
                                    "modal_id" => "delete_telefone_" . $r_telefone["id"]
                                ]);
                                ?>
                            </div>

                        <?php
                            includeFileWithVariables("../../components/modal/base.php", [
                                "r_contato" => $r_contato,
                                "r_telefone" => $r_telefone,
                                "modal" => "telephone",
                                "operation" => "edit",
                                "modal_id" => "telefone_" . $r_telefone["id"]
                            ]);

                            includeFileWithVariables("../../components/modal/base.php", [
                                "r_contato" => $r_contato,
                                "modal" => "telephone",
                                "operation" => "delete",
                                "delete_id" => $r_telefone["id"],
                                "delete_text" => 'o telefone "' . $r_telefone["telefone"] . '"',
                                "modal_id" => "delete_telefone_" . $r_telefone["id"],
                                "confirm_dialog" => true
                            ]);
                        }

                        includeFileWithVariables("../../components/add_button.php", [
                            "modal_id" => "add_telefone_contato_" . $r_contato["id"]
                        ]);

                        includeFileWithVariables("../../components/modal/base.php", [
                            "r_contato" => $r_contato,
                            "r_telefone" => $r_telefone,
                            "modal" => "telephone",
                            "operation" => "create",
                            "modal_id" => "add_telefone_contato_" . $r_contato["id"]
                        ]) ?>
                    </td>

                    <td><?php
                        $email = $conexao->prepare("SELECT * FROM email where contato_id = :contato_id");
                        $email->bindParam(":contato_id", $r_contato["id"], PDO::PARAM_STR);
                        $executa = $email->execute();
                        while ($r_email = $email->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="d-flex align-items-center justify-content-center position-relative">
                                <?php includeFileWithVariables("../../components/edit_link.php", [
                                    "modal_id" => "email_" . $r_email["id"],
                                    "link_text" => $r_email["email"]
                                ]);

                                includeFileWithVariables("../../components/delete_button.php", [
                                    "modal_id" => "delete_email_" . $r_email["id"]
                                ]);
                                ?>
                            </div>

                        <?php
                            includeFileWithVariables("../../components/modal/base.php", [
                                "r_contato" => $r_contato,
                                "r_email" => $r_email,
                                "modal" => "email",
                                "operation" => "edit",
                                "modal_id" => "email_" . $r_email["id"]
                            ]);

                            includeFileWithVariables("../../components/modal/base.php", [
                                "r_contato" => $r_contato,
                                "modal" => "email",
                                "operation" => "delete",
                                "delete_id" => $r_email["id"],
                                "delete_text" => 'o email "' . $r_email["email"] . '"',
                                "modal_id" => "delete_email_" . $r_email["id"],
                                "confirm_dialog" => true
                            ]);
                        }

                        includeFileWithVariables("../../components/add_button.php", [
                            "modal_id" => "add_email_contato_" . $r_contato["id"]
                        ]);

                        includeFileWithVariables("../../components/modal/base.php", [
                            "r_contato" => $r_contato,
                            "r_email" => $r_email,
                            "modal" => "email",
                            "operation" => "create",
                            "modal_id" => "add_email_contato_" . $r_contato["id"]
                        ]) ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>