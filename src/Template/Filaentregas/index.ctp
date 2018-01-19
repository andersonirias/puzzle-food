<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Filaentrega'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filaentregas index large-9 medium-8 columns content">
    <h3><?= __('Filaentregas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chegada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacoes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posicao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedidos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filaentregas as $filaentrega): ?>
            <tr>
                <td><?= $this->Number->format($filaentrega->id) ?></td>
                <td><?= h($filaentrega->chegada) ?></td>
                <td><?= h($filaentrega->status) ?></td>
                <td><?= h($filaentrega->observacoes) ?></td>
                <td><?= $this->Number->format($filaentrega->posicao) ?></td>
                <td><?= h($filaentrega->saida) ?></td>
                <td><?= $filaentrega->has('pedido') ? $this->Html->link($filaentrega->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $filaentrega->pedido->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $filaentrega->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filaentrega->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filaentrega->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filaentrega->id)]) ?>
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
