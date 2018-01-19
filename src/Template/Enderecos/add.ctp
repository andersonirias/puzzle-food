<style>
          .form-cadastro {
                margin: 50px auto 0px auto;
                max-width: 600px;
                background-color: white;
                position: relative;
                left: 33%
                }

</style>

<div class="enderecos form large-9 medium-8 columns content form-cadastro">
    <?= $this->Form->create($endereco) ?>
    <fieldset>
        <legend><?= __('Adicionar Endereço') ?></legend>
        <?php
            echo $this->Form->input('cidade');
            echo $this->Form->input('bairro');
            echo $this->Form->input('rua');
            echo $this->Form->input('numero',['type' => 'number']);
            echo $this->Form->input('complemento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Cadastrar')) ?>
    <?= $this->Form->end() ?>
</div>
