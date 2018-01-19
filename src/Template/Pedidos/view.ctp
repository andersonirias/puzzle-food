<style>
	.quadro{
		position: relative;
		left: 15%;
		width: 70%;
	}
</style>
<div class="pedidos view large-9 medium-8 columns content quadro">
    </br></br>
    <a href="http://irias.com.br/filapedidos"><h3>Voltar</h3></a>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Form Pagamento') ?></th>
            <td><?= h($pedido->form_pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacoes') ?></th>
            <td><?= h($pedido->observacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($pedido->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criação') ?></th>
            <td><?= h($pedido->criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ultima alteração') ?></th>
            <td><?= h($pedido->alteracao) ?></td>
        </tr>
	<tr>
            <th scope="row"><?= __('Pratos') ?></th>
            <td><?= h($pedido->pratos) ?></td>
        </tr>
	<tr>
            <th scope="row"><?= __('Ingredientes') ?></th>
            <td><?= h($pedido->ingredientes) ?></td>
        </tr>
	
    </table>
</div>
