<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
        <li><?= $this->Html->link(__('Novo Endereço'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Meus Endereços'), ['controller' => 'Enderecos','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Meus Dados'), ['controller' => 'Consumidores', 'action' => 'view', $user]) ?></li>
    </ul>
</nav>
<div class="enderecos form large-9 medium-8 columns content">
    <?= $this->Form->create($endereco) ?>
    <fieldset>
        <legend><?= __('Edit Endereco') ?></legend>
        <?php
            echo $this->Form->input('cidade');
            echo $this->Form->input('bairro');
            echo $this->Form->input('rua');
            echo $this->Form->input('numero',['type' => 'number']);
            echo $this->Form->input('complemento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
