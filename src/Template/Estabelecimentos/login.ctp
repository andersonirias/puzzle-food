<style>
	.form-login {
		margin: 50px auto 0px auto;
		max-width: 600px;
		background-color: white;
		}
</style>
<div class="users form form-login">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create('') ?>
    <fieldset>
        <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
        <?= $this->Form->input('login',['placeholder' => 'Usuário','label' => '']) ?>
        <?= $this->Form->input('senha',['placeholder' => 'Senha','label' => '','type' => 'password']) ?>
    </fieldset>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
</div>


