<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pedidos Has Prato'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidosHasPratos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos Has Pratos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedidos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pratos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidosHasPratos as $pedidosHasPrato): ?>
            <tr>
                <td><?= $this->Number->format($pedidosHasPrato->id) ?></td>
                <td><?= $pedidosHasPrato->has('pedido') ? $this->Html->link($pedidosHasPrato->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosHasPrato->pedido->id]) : '' ?></td>
                <td><?= $pedidosHasPrato->has('prato') ? $this->Html->link($pedidosHasPrato->prato->id, ['controller' => 'Pratos', 'action' => 'view', $pedidosHasPrato->prato->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedidosHasPrato->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedidosHasPrato->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidosHasPrato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosHasPrato->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
