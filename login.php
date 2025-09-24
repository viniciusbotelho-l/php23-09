<?php
 include("conexao.php");
 $cpf = $_POST['cpf'];
 $senha = $_POST['senha'];


$sql = "select nome from usuarios where cpf = ? and senha = ?";
if ($stmt = $conn ->prepare($sql)){
    $stmt->bind_param("sss", $cpf, $nome, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();




    $row = $resultado->fetch_assoc();



if(isset($row) && $row['nome'] != ''){
   session_start();
   $_SESSION['nome'] = $row['nome'];
   $_SESSION['cpf'] = $_POST['cpf'];
   $_SESSION['senha'] = $_POST['senha'];
   header("Location: principal.php");
}else{
    echo 'erro no login';
}

}else{
    echo "erro no banco de dados";
}
$conn->close();
?>
