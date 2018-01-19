<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('Meus dados'), ['action' => 'view', $estabelecimento->id]) ?> </li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes','action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estabelecimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($estabelecimento) ?>
    <fieldset>
        <legend><?= __('Editar dados') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('ramo');
            echo $this->Form->input('descricao');
            echo $this->Form->input('rua');
            echo $this->Form->input('bairro');
            echo $this->Form->input('cidade');
            echo $this->Form->input('numero');
            echo $this->Form->input('email',['type' => 'email']);
            echo $this->Form->input('site',['type' => 'url']);
            echo $this->Form->input('telefone',['type' => 'number']);
            echo $this->Form->input('entrega');
            echo $this->Form->input('login');
            echo $this->Form->input('senha',['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
