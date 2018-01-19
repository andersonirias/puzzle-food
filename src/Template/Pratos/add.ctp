<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
        <li><?= $this->Html->link(__('Pratos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Fila de pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Fila de entregas'), ['controller' => 'Filaentregas', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pratos form large-9 medium-8 columns content">
    <?= $this->Form->create($prato,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Novo Prato') ?></legend>
        <?php
            echo $this->Form->input('valor');
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao', ['label' => 'descrição']);
            echo $this->Form->input('ativo');
            echo $this->Form->input('montagem');
            echo $this->Form->input('categorias_id', ['options' => $categorias]);
	    echo $this->Form->input('imagem',['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
