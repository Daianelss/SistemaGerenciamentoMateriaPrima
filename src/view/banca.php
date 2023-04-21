<?php
require_once 'bancaview.php'; // Inclui o arquivo da classe bancaview

// Instancia a classe bancaview
$view = new bancaview();

// Chama o método para renderizar o formulário de cadastro
$view->renderizarFormulario();
?>
