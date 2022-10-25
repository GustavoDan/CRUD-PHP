<?php
if (isset($_POST['contact/create'])) {
    $inserir = $conexao->prepare("INSERT INTO contato VALUES (null, :nome, :idade)");
    $inserir->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
    $inserir->bindParam(':idade', $_POST['idade'], PDO::PARAM_STR);
    $executa = $inserir->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Contato criado.',
        "error_message" => 'O contato não foi criado.'
    ]);
}

if (isset($_POST['address/create'])) {
    $inserir = $conexao->prepare("INSERT INTO endereco VALUES (null, :estado, :cidade, :bairro, :rua, :numero, :complemento, :observacao, :contato_id)");
    $inserir->bindParam(':estado', $_POST['estado'], PDO::PARAM_STR);
    $inserir->bindParam(':cidade', $_POST['cidade'], PDO::PARAM_STR);
    $inserir->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_STR);
    $inserir->bindParam(':rua', $_POST['rua'], PDO::PARAM_STR);
    $inserir->bindParam(':numero', $_POST['numero'], PDO::PARAM_STR);
    $inserir->bindParam(':complemento', $_POST['complemento'], PDO::PARAM_STR);
    $inserir->bindParam(':observacao', $_POST['observacao'], PDO::PARAM_STR);
    $inserir->bindParam(':contato_id', $_POST['id'], PDO::PARAM_STR);
    $executa = $inserir->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Endereço salvo.',
        "error_message" => 'O Endereço não foi salvo.'
    ]);
}

if (isset($_POST['telephone/create'])) {
    $inserir = $conexao->prepare("INSERT INTO telefone VALUES (null, :telefone, :perfil, :contato_id)");
    $inserir->bindParam(':telefone', $_POST['telefone'], PDO::PARAM_STR);
    $inserir->bindParam(':perfil', $_POST['perfil'], PDO::PARAM_STR);
    $inserir->bindParam(':contato_id', $_POST['id'], PDO::PARAM_STR);
    $executa = $inserir->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Telefone salvo.',
        "error_message" => 'O telefone não foi salvo.'
    ]);
}

if (isset($_POST['email/create'])) {
    $inserir = $conexao->prepare("INSERT INTO email VALUES (null, :email, :perfil, :contato_id)");
    $inserir->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $inserir->bindParam(':perfil', $_POST['perfil'], PDO::PARAM_STR);
    $inserir->bindParam(':contato_id', $_POST['id'], PDO::PARAM_STR);
    $executa = $inserir->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Email salvo.',
        "error_message" => 'O email não foi salvo.'
    ]);
}

if (isset($_POST['contact/edit'])) {
    $atualizar = $conexao->prepare("UPDATE contato SET nome = :nome, idade = :idade WHERE id = :id");
    $atualizar->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
    $atualizar->bindParam(':idade', $_POST['idade'], PDO::PARAM_STR);
    $atualizar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $atualizar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Contato atualizado.',
        "error_message" => 'Os contato não foi atualizado.'
    ]);
}

if (isset($_POST['address/edit'])) {
    $atualizar = $conexao->prepare("UPDATE endereco SET estado = :estado, cidade = :cidade, bairro = :bairro, rua = :rua, numero = :numero, complemento = :complemento, observacao = :observacao WHERE id = :id");
    $atualizar->bindParam(':estado', $_POST['estado'], PDO::PARAM_STR);
    $atualizar->bindParam(':cidade', $_POST['cidade'], PDO::PARAM_STR);
    $atualizar->bindParam(':bairro', $_POST['bairro'], PDO::PARAM_STR);
    $atualizar->bindParam(':rua', $_POST['rua'], PDO::PARAM_STR);
    $atualizar->bindParam(':numero', $_POST['numero'], PDO::PARAM_STR);
    $atualizar->bindParam(':complemento', $_POST['complemento'], PDO::PARAM_STR);
    $atualizar->bindParam(':observacao', $_POST['observacao'], PDO::PARAM_STR);
    $atualizar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $atualizar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Endereço atualizado.',
        "error_message" => 'O Endereço não foi atualizado.'
    ]);
}


if (isset($_POST['telephone/edit'])) {
    $atualizar = $conexao->prepare("UPDATE telefone SET telefone = :telefone, perfil = :perfil WHERE id = :id");
    $atualizar->bindParam(':telefone', $_POST['telefone'], PDO::PARAM_STR);
    $atualizar->bindParam(':perfil', $_POST['perfil'], PDO::PARAM_STR);
    $atualizar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $atualizar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Telefone atualizado.',
        "error_message" => 'O telefone não foi atualizado.'
    ]);
}

if (isset($_POST['email/edit'])) {
    $atualizar = $conexao->prepare("UPDATE email SET email = :email, perfil = :perfil WHERE id = :id");
    $atualizar->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $atualizar->bindParam(':perfil', $_POST['perfil'], PDO::PARAM_STR);
    $atualizar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $atualizar->execute();
    echo "id" . $_POST['id'];


    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Email atualizado.',
        "error_message" => 'O email não foi atualizado.'
    ]);
}

if (isset($_POST['contact/delete'])) {
    $deletar = $conexao->prepare("DELETE FROM contato WHERE id = :id");
    $deletar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $deletar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Contato deletado.',
        "error_message" => 'O contato não foi deletado.'
    ]);
}

if (isset($_POST['address/delete'])) {
    $deletar = $conexao->prepare("DELETE FROM endereco WHERE id = :id");
    $deletar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $deletar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Endereço deletado.',
        "error_message" => 'O Endereço não foi deletado.'
    ]);
}

if (isset($_POST['telephone/delete'])) {
    $deletar = $conexao->prepare("DELETE FROM telefone WHERE id = :id");
    $deletar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $deletar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Telefone deletado.',
        "error_message" => 'O telefone não foi deletado.'
    ]);
}


if (isset($_POST['email/delete'])) {
    $deletar = $conexao->prepare("DELETE FROM email WHERE id = :id");
    $deletar->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $executa = $deletar->execute();

    includeFileWithVariables("components/alert.php", [
        "condition" => $executa,
        "success_message" => 'Email deletado.',
        "error_message" => 'O email não foi deletado.'
    ]);
}
