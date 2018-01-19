<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedidos Has Prato'), ['action' => 'edit', $pedidosHasPrato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedidos Has Prato'), ['action' => 'delete', $pedidosHasPrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosHasPrato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Has Pratos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Has Prato'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidosHasPratos view large-9 medium-8 columns content">
    <h3><?= h($pedidosHasPrato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $pedidosHasPrato->has('pedido') ? $this->Html->link($pedidosHasPrato->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosHasPrato->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prato') ?></th>
            <td><?= $pedidosHasPrato->has('prato') ? $this->Html->link($pedidosHasPrato->prato->id, ['controller' => 'Pratos', 'action' => 'view', $pedidosHasPrato->prato->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedidosHasPrato->id) ?></td>
        </tr>
    </table>
</div>
