<?php
require 'config.php';

$info = []; //contem infos do usuario
$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM novosusuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    //verificar se achou algo
    if($sql->rowCount() > 0){
        $info = $sql->fetch(PDO::FETCH_ASSOC);//somente fetch, pega só o primeiro item
        /*
        array é o proprio array
        se usasse fetchAll: $info=[0]['nome']
        usando somente fetch: $info=['nome']
        */
    }else{
        header("Location: index.php");
        exit;
    }

}else{
    header("Location: index.php");
    exit;
}

?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?= $info['id'] ?>" />

    <label>
        Nome: <br>
        <input type="text" name="name" value="<?= $info['nome'] ?>"/>
    </label>
    <br>
    <br>
    <label>
        Email: <br>
        <input type="email" name="email" value="<?= $info['email'] ?>"/>
    </label>
    
    <br><br>

    <input type="submit" value="Salvar"/>
</form>