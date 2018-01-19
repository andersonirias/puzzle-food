<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bebida->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bebida->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bebidas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bebidas form large-9 medium-8 columns content">
    <?= $this->Form->create($bebida) ?>
    <fieldset>
        <legend><?= __('Edit Bebida') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('valor');
            echo $this->Form->input('descricao');
            echo $this->Form->input('disponivel');
            echo $this->Form->input('categorias_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
