<?php
//pegando dados do formulario
$nome =$_post['nome'];
$email =$_post['email'];
$telefone =$_post['tel'];
$feminino =$_post['genero'];
$masculino =$_post['genero'];
$outro =$_post['genero'];
$data de nascimento =$_post['data nascimento'];
$cidade =$_post['cidade'];
$estado =$_post['estado'];
$endereço =$_post['endereco'];
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');

//configuraçoes de credencias
$server = 'localhost';
$usuario = 'root'
$senha = '';
$banco = 'tcc'
//conexao com banco de dados
$conn = new mysqli($server, $usuario, $senha, $banco);
//verificar conexao
if($conn->connect_error){
    die("Falha ao se conectar com o banco de dados: " .$conn->connect_error);
}

$smtp = $conn->prepare("INSERIR INTO usuarios (nome, email, telefone, genero, data nascimento, cidade, estado, endereco, data, hora) VALUES (?,?,?,?,?,?,?,?,?,?)");
$smtp->bind_param("ssssssssss", $nome, $email, $telefone, $genero, $data de nascimento, $cidade, $estado, $endereco, $data_atual, $hora_atual);

if($smtp->execute()){
    echo "cadastrado com sucesso: ";
}else{
    echo "Erro no cadastro: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>
