<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes','action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Meus dados'), ['controller' => 'estabelecimentos', 'action' => 'view', $estab]) ?></li>
    </ul>
</nav>
<div class="ingredientes form large-9 medium-8 columns content">
    <?= $this->Form->create($ingrediente) ?>
    <fieldset>
        <legend><?= __('Editar Ingrediente') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao',['label' => 'Descrição']);
            echo $this->Form->input('estoque');
            echo $this->Form->input('adicional');
            echo $this->Form->input('valor');
            echo $this->Form->input('categorias_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
