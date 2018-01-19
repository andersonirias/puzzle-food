<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mesas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Estabelecimentos'), ['controller' => 'Estabelecimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estabelecimento'), ['controller' => 'Estabelecimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mesas form large-9 medium-8 columns content">
    <?= $this->Form->create($mesa) ?>
    <fieldset>
        <legend><?= __('Add Mesa') ?></legend>
        <?php
            echo $this->Form->input('quant_pessoas');
            echo $this->Form->input('estabelecimentos_id', ['options' => $estabelecimentos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
