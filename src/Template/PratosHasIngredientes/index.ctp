<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pratos Has Ingrediente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pratosHasIngredientes index large-9 medium-8 columns content">
    <h3><?= __('Pratos Has Ingredientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pratos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ingredientes_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pratosHasIngredientes as $pratosHasIngrediente): ?>
            <tr>
                <td><?= $this->Number->format($pratosHasIngrediente->id) ?></td>
                <td><?= $pratosHasIngrediente->has('prato') ? $this->Html->link($pratosHasIngrediente->prato->id, ['controller' => 'Pratos', 'action' => 'view', $pratosHasIngrediente->prato->id]) : '' ?></td>
                <td><?= $pratosHasIngrediente->has('ingrediente') ? $this->Html->link($pratosHasIngrediente->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $pratosHasIngrediente->ingrediente->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pratosHasIngrediente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pratosHasIngrediente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pratosHasIngrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pratosHasIngrediente->id)]) ?>
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
