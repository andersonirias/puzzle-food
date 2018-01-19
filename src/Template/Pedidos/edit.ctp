<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Consumidores'), ['controller' => 'Consumidores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Consumidore'), ['controller' => 'Consumidores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Edit Pedido') ?></legend>
        <?php
            echo $this->Form->input('valor');
            echo $this->Form->input('entrega');
            echo $this->Form->input('form_pagamento');
            echo $this->Form->input('criacao');
            echo $this->Form->input('observacoes');
            echo $this->Form->input('alteracao');
            echo $this->Form->input('consumidores_id', ['options' => $consumidores]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
