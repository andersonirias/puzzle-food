<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pratosHasIngrediente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pratosHasIngrediente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pratos Has Ingredientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pratosHasIngredientes form large-9 medium-8 columns content">
    <?= $this->Form->create($pratosHasIngrediente) ?>
    <fieldset>
        <legend><?= __('Edit Pratos Has Ingrediente') ?></legend>
        <?php
            echo $this->Form->input('pratos_id', ['options' => $pratos]);
            echo $this->Form->input('ingredientes_id', ['options' => $ingredientes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
