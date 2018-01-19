<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedidosHasPrato->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosHasPrato->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos Has Pratos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidosHasPratos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedidosHasPrato) ?>
    <fieldset>
        <legend><?= __('Edit Pedidos Has Prato') ?></legend>
        <?php
            echo $this->Form->input('pedidos_id', ['options' => $pedidos]);
            echo $this->Form->input('pratos_id', ['options' => $pratos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
