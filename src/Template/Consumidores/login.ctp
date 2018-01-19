<style>
	.form-login {
		margin: 50px auto 0px auto;
		max-width: 650px;
		background-color: white;
		border:2px solid #ffffff;
		}
</style>
<div class="users form form-login">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create('') ?>
    <fieldset>
        <center><img src="http://irias.com.br/img/LOGO.png" class="img-responsive" id="log-apre"></center>
        <?= $this->Form->input('login',['placeholder' => 'Usuário','label' => '']) ?>
        <?= $this->Form->input('senha',['placeholder' => 'Senha','label' => '','type' => 'password']) ?>
    </fieldset>
    <span>&nbsp;&nbsp;&nbsp;Ainda não tem uma conta ? <a href='http://irias.com.br/consumidores/add'>Cadastre-se</a><span>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
		</br></br>
</div>