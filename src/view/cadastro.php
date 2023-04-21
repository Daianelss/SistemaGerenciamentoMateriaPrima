<?php
require_once 'cadastroview.php'; // Inclui o arquivo da classe bancaview

// Instancia a classe bancaview
$view = new cadastroview();

// Chama o método para renderizar o formulário de cadastro
$view->renderizarFormulario();
$view->renderizarTabela();
?>
