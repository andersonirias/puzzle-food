<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes','action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Meus dados'), ['controller' => 'estabelecimentos', 'action' => 'view', $estab]) ?></li>
    </ul>
</nav>
<div class="filapedidos index large-9 medium-8 columns content">
    <h3><?= __('Fila de Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Número') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Chegada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Observações') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pedido') ?></th>
		<th scope="col"><?= $this->Paginator->sort('Endereço entrega') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filapedidos as $filapedido): ?>
            <tr>
                <td><?= $this->Number->format($filapedido->id) ?></td>
                <td><?= h($filapedido->chegada) ?></td>
                <td><?= h($filapedido->status) ?></td>
                <td><?= h($filapedido->observacoes) ?></td>
                <td><?= $filapedido->has('pedido') ? $this->Html->link($filapedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $filapedido->pedido->id]) : '' ?></td>
		<td>
		<?php
			if ($filapedido['enderecos_id'] != 0){
				echo $this->Html->link($filapedido['enderecos_id'], ['controller' => 'Enderecos', 'action' => 'view', $filapedido['enderecos_id']]);
			}else{
				echo '<a href="#" title="Cliente pegara o pedido no estabelecimento">X</a>';
			}
		?>
		</td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $filapedido->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $filapedido->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
        </ul>
    </div>
</div>
