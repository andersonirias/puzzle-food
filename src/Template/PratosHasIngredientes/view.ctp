<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pratos Has Ingrediente'), ['action' => 'edit', $pratosHasIngrediente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pratos Has Ingrediente'), ['action' => 'delete', $pratosHasIngrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pratosHasIngrediente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pratos Has Ingredientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pratos Has Ingrediente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pratosHasIngredientes view large-9 medium-8 columns content">
    <h3><?= h($pratosHasIngrediente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Prato') ?></th>
            <td><?= $pratosHasIngrediente->has('prato') ? $this->Html->link($pratosHasIngrediente->prato->id, ['controller' => 'Pratos', 'action' => 'view', $pratosHasIngrediente->prato->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ingrediente') ?></th>
            <td><?= $pratosHasIngrediente->has('ingrediente') ? $this->Html->link($pratosHasIngrediente->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $pratosHasIngrediente->ingrediente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pratosHasIngrediente->id) ?></td>
        </tr>
    </table>
</div>
