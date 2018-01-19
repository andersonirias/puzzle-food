<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Estabelecimentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="estabelecimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($estabelecimento) ?>
    <fieldset>
        <legend><?= __('Add Estabelecimento') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('razao_social');
            echo $this->Form->input('cnpj');
            echo $this->Form->input('ramo');
            echo $this->Form->input('descricao');
            echo $this->Form->input('rua');
            echo $this->Form->input('bairro');
            echo $this->Form->input('cidade');
            echo $this->Form->input('numero');
            echo $this->Form->input('email');
            echo $this->Form->input('site');
            echo $this->Form->input('telefone');
            echo $this->Form->input('criacao');
            echo $this->Form->input('alteracao');
            echo $this->Form->input('entrega');
            echo $this->Form->input('login');
            echo $this->Form->input('senha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
