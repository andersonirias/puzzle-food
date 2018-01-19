<style>
#div1 {
	width: 75%;
        height: 25%;
        margin: 10px;
        padding: 10px;
        border: 1px solid black;
}

.select-ingr {
	background-color: #be140b;
	color: white;
}

.select-ingr:hover{
	background-color: #daa520;
}

button.accordion {
    background-color: #be140b;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border-bottom-width: 1px;
    border-style: solid;
    border-color: white;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #daa520;
}

div.panel {
    padding: 0 18px;
    display: none;
    color: white;
    background-color: #F5F5F5;
}

div.panel.show {
    display: block;
}

.valor-prato {
	position: relative;
	left: 50%;
}
.side-nav li a:not(.button) {
  color: white;
}
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<h3>Ingredientes</h3>
                </br>
		<?php
			foreach ($listaCategorias as $categoria):
				echo '<button class="accordion">'.$categoria['nome'].'</button>';
                            	echo '<div class="panel" id="ingrediente"></br>';
                            	foreach ($listaIngredientes as $ingrediente):
                                    	if ($ingrediente['categorias_id'] == $categoria['id']){
                                            	echo '<li>';
                                            	echo '<a href="#" class="select-ingr"
						      onclick="pegaIngrediente(10'.$ingrediente['id'].')"
                                                  	id="10'.$ingrediente['id'].'"
                                                  	valor="'.$ingrediente['valor'].'"
                                                  	name="'.$ingrediente['nome'].'"
                                                  	title="'.$ingrediente['descricao'].'">
                                                  	'.$ingrediente['nome'].'</a>';
                                            	echo '<li>';
                                    	}
                            	endforeach;
                            	echo '</div>';
			endforeach;
               ?>
		</br></br>
		<h3>Pratos Prontos</h3>
		</br>
			<?php
				foreach ($listaCategorias as $categoria):
					echo '<button class="accordion">'.$categoria['nome'].'</button>';
                                	echo '<div class="panel"></br>';
					foreach ($listaPratos as $prato):
						if ($prato['categorias_id'] == $categoria['id']){
							echo '<li>';
							echo $prato['nome'];
							echo '</li>';
                                        		echo '<a href="#"" onclick="pegaPrato(11'.$prato['id'].')"
							id="11'.$prato['id'].'"
                                                        valor="'.$prato['valor'].'"
                                                        name="'.$prato['nome'].'"
                                                        title="'.$prato['descricao'].'">';
							
							
							echo '<div id="div1">';
							echo $this->Html->image($prato['imagem'],
                                                  			['class' => 'img-responsive',
                                                   			 'id' => '11'.$prato['id'],
                                                   			 'name' => $prato['nome'],
                                                   			 'alt' => $prato['nome']]);
								echo '</a>';
				       			echo '</div>';
						}
					endforeach;
                                	echo '</div>';
				endforeach;
			?>
	</ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
	<center><h1>Monte seu prato</h1></center>
	</br></br></br>
	<h5>Prato Criado</h5>
	<table cellpadding="0" cellspacing="0">
	   <thead>
		<tr>
		   <th>Ingrediente</th>
		   <th>Valor</th>
		   <th>Descrição</th>
		</tr>
	   </thead>
	   <tbody id="ingredi">
	   </tbody>
	</table>
	</br>
	<h5>Prato Pronto</h5>
	<table cellpadding="0" cellspacing="0">
           <thead>
                <tr>
                   <th>Nome</th>
                   <th>Valor</th>
                   <th>Descrição</th>
                </tr>
           </thead>
           <tbody id="prats">
           </tbody>
        </table>
	</br>
	<td><h3>Valor Total: R$ <span id="valorPrato">0</span></h3></td>
	<?= $this->Form->create($pedido) ?>
    		<fieldset>
        	<?php
        	    echo $this->Form->input('valor',['type' => 'hidden']); //deixar esse campo invisivel e exibir o valor em um h3
        	    echo $this->Form->input('form_pagamento', ['options' => ['Dinheiro','Cartão de credito','Cartão de debito']]);
        	    echo $this->Form->input('criacao',['type' => 'hidden']);//deixar esse campo invisivel
        	    //echo $this->Form->input('observacoes'); 
		    echo $this->Form->input('ingredientes',['type' => 'hidden']); //deixar esse campo invisivel
		    echo $this->Form->input('pratos',['type' => 'hidden']); //deixar esse campo invisivel
        	    echo $this->Form->input('alteracao',['type' => 'hidden']);//deixar esse campo invisivel
        	?>
    </fieldset>

    <?= $this->Form->button(__('Pedir')) ?>
    <?= $this->Form->end() ?>

	
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}

function pegaIngrediente(id) {
	var ingredienteNome = document.getElementById(id).getAttribute('name');
	var ingredienteDesc = document.getElementById(id).getAttribute('title');
	var ingredienteValor = document.getElementById(id).getAttribute('valor');
	var tr = document.createElement("tr",id);
	var nome = document.createElement("td");
	var valor = document.createElement("td");
	var desc = document.createElement("td");
	var n = document.createTextNode(ingredienteNome);
	var v = document.createTextNode("R$ "+ingredienteValor);
	var d = document.createTextNode(ingredienteDesc);
	nome.appendChild(n);
	valor.appendChild(v);
	desc.appendChild(d);
        tr.appendChild(nome);
        tr.appendChild(valor);
        tr.appendChild(desc);
	document.getElementById("ingredi").appendChild(tr);
	
	var valorTotal = document.getElementById("valorPrato").textContent;
	Number(valorTotal);
	valorTotal = Number(valorTotal) + Number(ingredienteValor);
	document.getElementById("valorPrato").innerHTML = valorTotal;
	
	var ingredientesPedidos = document.getElementById('ingredientes').value;
	document.getElementById('ingredientes').value = ingredientesPedidos+"Id do ingrediente: "+id+" "+ingredienteNome+" "+ingredienteValor+" "+ingredienteDesc+"; ";
	document.getElementById('valor').value = valorTotal;
}

function pegaPrato(pt) {
	var pratoNome = document.getElementById(pt).getAttribute('name');
        var pratoDesc = document.getElementById(pt).getAttribute('title');
        var pratoValor = document.getElementById(pt).getAttribute('valor');
        var tr = document.createElement("tr");
        var nome = document.createElement("td");
        var valor = document.createElement("td");
        var desc = document.createElement("td");
        var n = document.createTextNode(pratoNome);
        var v = document.createTextNode("R$ "+pratoValor);
        var d = document.createTextNode(pratoDesc);
        nome.appendChild(n);
        valor.appendChild(v);
        desc.appendChild(d);
        tr.appendChild(nome);
        tr.appendChild(valor);
        tr.appendChild(desc);
        document.getElementById("prats").appendChild(tr);
        
        var valorTotal = document.getElementById("valorPrato").textContent;
        Number(valorTotal);
        valorTotal = Number(valorTotal) + Number(pratoValor);
        document.getElementById("valorPrato").innerHTML = valorTotal;
        
        var pratosPedidos = document.getElementById("pratos").value;
        document.getElementById("pratos").value = pratosPedidos+"Id do prato: "+pt+" "+pratoNome+" "+pratoValor+" "+pratoDesc+"; ";
        document.getElementById("valor").value = valorTotal;

}


</script>

