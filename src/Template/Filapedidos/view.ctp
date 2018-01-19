<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('Editar'), ['action' => 'edit', $filapedido->id]) ?> </li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes','action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Meus dados'), ['controller' => 'estabelecimentos', 'action' => 'view', $estab]) ?></li>
    </ul>
</nav>
<div class="filapedidos view large-9 medium-8 columns content">
    <h3><?= h($filapedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($filapedido->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observações') ?></th>
            <td><?= h($filapedido->observacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $filapedido->has('pedido') ? $this->Html->link($filapedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $filapedido->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número') ?></th>
            <td><?= $this->Number->format($filapedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chegada') ?></th>
            <td><?= h($filapedido->chegada) ?></td>
        </tr>
    </table>
</div>
