<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Consumidores'), ['controller' => 'Consumidores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Consumidore'), ['controller' => 'Consumidores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entrega') ?></th>
                <th scope="col"><?= $this->Paginator->sort('form_pagamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacoes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consumidores_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
            <tr>
                <td><?= $this->Number->format($pedido->id) ?></td>
                <td><?= $this->Number->format($pedido->valor) ?></td>
                <td><?= h($pedido->entrega) ?></td>
                <td><?= h($pedido->form_pagamento) ?></td>
                <td><?= h($pedido->criacao) ?></td>
                <td><?= h($pedido->observacoes) ?></td>
                <td><?= h($pedido->alteracao) ?></td>
                <td><?= $pedido->has('consumidore') ? $this->Html->link($pedido->consumidore->id, ['controller' => 'Consumidores', 'action' => 'view', $pedido->consumidore->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
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
