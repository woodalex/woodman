<html>
<body>
<?php

// Dados da Base de dados SQL
$servidor="localhost";
$username="root";
$password="teste";
$bd="teste";

// criar ligação
$conn = new mysqli($servidor,$username,$password,$bd); 

// consulta base de dados SQL clientes 
$sql = "SELECT * FROM clientes";
$resultado=$conn->query($sql);

//Mostrar os dados da tabela clientes
if ($resultado->num_rows > 0) {
        while ($row=$resultado->fetch_assoc()){
                echo "Nome->".$row["nome"]." ID->".$row["id"]."<br>";
        }}
else
{
	echo "#########################################<br>";
        echo "######## A Base de Dados Clientes está vazia!! #########<br>";
	echo "#########################################<br>";

}
?>
<!-- Caixa para colocar o ID do Cliente para apagar -->
<h1>Apagar Cliente</h1>
   <form method="POST">
  Qual o Número de Cliente?<input type="number" min="1"  name="pesquisar" placeholder="ID">
   <input type="submit" value="ENVIAR">


</form>

<?php
// consulta base de dados SQL clientes para o ID do cliente colocado na caixa 
    $pesquisar = $_POST['pesquisar'];
    $query = "SELECT * FROM clientes WHERE id = $pesquisar";
    $apagar=" DELETE from clientes where id= $pesquisar";
    $resultado = $conn->query($query);

//Mostra o resultado da operação apagar cliente
    if ($pesquisar == NULL) {
                echo "######## ERRO ########<br> Tem de colocar o ID do Cliente! <br>";
		echo "######################<br>";
        }
//	else ($resultado->num_rows == 0) {
//		echo "A Base de Dados Clientes está vazia!!";
//		}
       elseif ($resultado->num_rows > 0) {
                while ($row=$resultado->fetch_assoc()){
                        echo "Nome->".$row["nome"]." ID->".$row["id"]."<br>";
                        $apagar_user=$conn->query($apagar);
                        echo "<br>O Cliente ".$row["id"]." eliminado da Base de Dados!<br>";
		}		}	
			else {
                echo "O Cliente com o ID ".$pesquisar." não existe!<br>";
                }
$conn->close();
?>

</body>
</html>
