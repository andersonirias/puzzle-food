<style>
	.quadro{
		width: 70%;
		position: relative;
		left: 15%;
	}
</style>
<div class="enderecos index large-9 medium-8 columns content quadro">
    <h3><?= __('Escolha o endereço para entrega') ?></h3>
<?php echo'<form method="post" action="http://irias.com.br/filapedidos/add/'.$ped.'">'; ?>
<?php echo'<input type="hidden" value="'.$ped.'" name="pedido">'; ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
		<th scope="col"><?= $this->Paginator->sort('escolha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rua') ?></th>
                <th scope="col"><?= $this->Paginator->sort('número') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enderecos as $endereco): ?>
            <tr>
	        <td><?php echo'<input type="radio" name="enderecoselec" value="'.$endereco->id.'" checked>'; ?></td>
                <td><?= h($endereco->cidade) ?></td>
                <td><?= h($endereco->bairro) ?></td>
                <td><?= h($endereco->rua) ?></td>
                <td><?= h($endereco->numero) ?></td>
                <td><?= h($endereco->complemento) ?></td>
            </tr>
            <?php endforeach; ?>
	    <tr>
		<td><input type="radio" name="enderecoselec" value="0"></td>
	        <td>Pegar no estabelecimento</td>
	    </tr>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
        </ul>
    </div>
<button type="submit">Usar este</button>
</form>
</div>
