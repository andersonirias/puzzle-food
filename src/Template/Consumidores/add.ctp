<style>
	  .form-cadastro {
                margin: 50px auto 0px auto;
                max-width: 600px;
                background-color: white;
		position: relative;
		left: 33%
                }

</style>
<div class="consumidores form large-9 medium-8 columns content form-cadastro">
    <?= $this->Form->create($consumidore) ?>
    <fieldset>
        <legend><?= __('Cadastro') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('email',['type' => 'email']);
            echo $this->Form->input('cpf');
            echo $this->Form->input('telefone',['type' => 'number']);
            echo $this->Form->input('nascimento', ['empty' => false,'type' => 'datetime-local']);
            echo $this->Form->input('login');
            echo $this->Form->input('senha',['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Cadastrar')) ?>
    <?= $this->Form->end() ?>
</div>
