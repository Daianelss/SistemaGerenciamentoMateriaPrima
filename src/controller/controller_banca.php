<?php
require_once "../config/db.php";
echo "controller banca";
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores do formulário
    $funcionario = $_POST['funcionario'];
    $dataEntrada = $_POST['data_entrada'];
    $pesoEntrada = $_POST['peso_entrada'];
    $dataSaida = $_POST['data_saida'];
    $pesoSaida = $_POST['peso_saida'];

    // Calcula a quebra

    function calculo_quebra($pesoEntrada, $pesoSaida){
        $quebra = $pesoEntrada - $pesoSaida;
    }

    // Cria um array com os valores do formulário
    $entrada = array(
        'funcionario' => $funcionario,
        'dataEntrada' => $dataEntrada,
        'pesoEntrada' => $pesoEntrada,
        'dataSaida' => $dataSaida,
        'pesoSaida' => $pesoSaida,
        'quebra' => $quebra
    );

    // Verifica se já existe uma sessão para as bancas
    if (!isset($_SESSION['bancas'])) {
        $_SESSION['bancas'] = array(); // Se não existir, cria um array vazio
    }

    // Adiciona a entrada à sessão
    array_push($_SESSION['bancas'], $entrada);
}


// Verifica se existem entradas na sessão
if (isset($_SESSION['bancas']) && !empty($_SESSION['bancas'])) {
    foreach ($_SESSION['bancas'] as $entrada) {
        ?>
        <tr>
            <td><?php echo $entrada['funcionario']; ?></td>
            <td><?php echo $entrada['dataEntrada']; ?></td>
            <td><?php echo $entrada['pesoEntrada']; ?></td>
            <td><?php echo $entrada['dataSaida']; ?></td>
            <td><?php echo $entrada['pesoSaida']; ?></td>
            <td id="quebra"><?php echo $entrada['quebra']; ?></td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="6">Nenhuma entrada adicionada ainda.</td>
    </tr>
    <?php
}
?>