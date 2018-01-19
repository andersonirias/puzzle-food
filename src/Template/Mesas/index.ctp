<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mesa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estabelecimentos'), ['controller' => 'Estabelecimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estabelecimento'), ['controller' => 'Estabelecimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mesas index large-9 medium-8 columns content">
    <h3><?= __('Mesas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quant_pessoas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estabelecimentos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mesas as $mesa): ?>
            <tr>
                <td><?= $this->Number->format($mesa->id) ?></td>
                <td><?= $this->Number->format($mesa->quant_pessoas) ?></td>
                <td><?= $mesa->has('estabelecimento') ? $this->Html->link($mesa->estabelecimento->id, ['controller' => 'Estabelecimentos', 'action' => 'view', $mesa->estabelecimento->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mesa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mesa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mesa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mesa->id)]) ?>
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
