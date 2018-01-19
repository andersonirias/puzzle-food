<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $filaentrega->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $filaentrega->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Filaentregas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filaentregas form large-9 medium-8 columns content">
    <?= $this->Form->create($filaentrega) ?>
    <fieldset>
        <legend><?= __('Edit Filaentrega') ?></legend>
        <?php
            echo $this->Form->input('chegada');
            echo $this->Form->input('status');
            echo $this->Form->input('observacoes');
            echo $this->Form->input('posicao');
            echo $this->Form->input('saida');
            echo $this->Form->input('pedidos_id', ['options' => $pedidos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
