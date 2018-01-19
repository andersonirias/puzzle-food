<style>
	.quadro{
		position: relative;
		left: 15%;
		width: 70%;
	}
</style>

<div class="enderecos view large-9 medium-8 columns content quadro">
    </br></br>
    <a href="http://irias.com.br/filapedidos"><h3>Voltar</h3></a>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($endereco->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bairro') ?></th>
            <td><?= h($endereco->bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rua') ?></th>
            <td><?= h($endereco->rua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número') ?></th>
            <td><?= h($endereco->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complemento') ?></th>
            <td><?= h($endereco->complemento) ?></td>
        </tr>
    </table>
</div>
