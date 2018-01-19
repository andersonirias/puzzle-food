<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
        <li><?= $this->Html->link(__('Meus Dados'), ['action' => 'view', $consumidore->id]) ?> </li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Meus Endereços'), ['controller' => 'Enderecos', 'action' => 'index', $id]) ?></li>
    </ul>
</nav>
<div class="consumidores form large-9 medium-8 columns content">
    <?= $this->Form->create($consumidore) ?>
    <fieldset>
        <legend><?= __('Editar dados do Consumidor') ?></legend>
        <?php
            echo $this->Form->input('email',['type' => 'email']);
            echo $this->Form->input('telefone',['type' => 'number']);
            echo $this->Form->input('nascimento', ['empty' => false,'type' => 'datetime-local']);
            echo $this->Form->input('login');
            echo $this->Form->input('senha',['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
 