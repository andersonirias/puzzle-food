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
						      onclick="addIngr(10'.$ingrediente['id'].')"
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
                                        		echo '<a href="#"" onclick="addPtr(11'.$prato['id'].')"
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
		   <th>Remover</th>
		</tr>
	   </thead>
	   <tbody id="foods">
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
				   <th>Remover</th>
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


var ingrList = [];
var precos = [];
	
function addIngr (id) {
    var addIngr = "<td>"+document.getElementById(id).name+"</td>";
	var ingrValor = "<td>"+document.getElementById(id).getAttribute('valor')+"</td>";
	var ingrTitle = "<td>"+document.getElementById(id).getAttribute('title')+"</td>";
	var addIngr = addIngr + ingrValor + ingrTitle
    ingrList.push(addIngr);
	precos.push(document.getElementById(id).getAttribute('valor'));
    
    for (i = 0; i < ingrList.length; i++)	{
        var newIngr= "<tr>" + ingrList[i] +"<td><a href='#' onClick='removeRecord(" + i + ");'>X</a></td></tr> ";
		var valorTotal = document.getElementById("valorPrato").textContent;
        valorTotal = Number(valorTotal) + Number(precos[i]);
      
	
    };
    document.getElementById('foods').innerHTML += newIngr;
	document.getElementById("valorPrato").innerHTML = valorTotal;
 	  
	document.getElementById('ingredientes').value = ingrList;
	document.getElementById('valor').value = valorTotal;
	  
}


function removeRecord (i) {

    ingrList.splice(i, 1);
	
	var valorTotal = document.getElementById("valorPrato").textContent;
	valorTotal = Number(valorTotal) - precos[i];
	precos.splice(i, 1);

    var newIngr = "";
    // re-display the records from foodList the same way we did it in addToFood()
    for (var i = 0; i < ingrList.length; i++) {
       newIngr += "<tr>" + ingrList[i] +"<td><a href='#' onClick='removeRecord(" + i + ");'>X</a></td></tr>";
	 
    };
    document.getElementById('foods').innerHTML = newIngr;
	document.getElementById("valorPrato").innerHTML = valorTotal;
	
	  
	document.getElementById('ingredientes').value = ingrList;
	document.getElementById('valor').value = valorTotal;

}


	var ptrList = [];

	
function addPtr (id) {
    var addPtr = "<td>"+document.getElementById(id).name+"</td>";
	var ptrValor = "<td>"+document.getElementById(id).getAttribute('valor')+"</td>";
	var ptrTitle = "<td>"+document.getElementById(id).getAttribute('title')+"</td>";
	var addPtr = addPtr + ptrValor + ptrTitle
    	ptrList.push(addPtr);
	precos.push(document.getElementById(id).getAttribute('valor'));
    
    for (i = 0; i < ptrList.length; i++)	{
        var newPtr= "<tr>" + ptrList[i] +"<td><a href='#' onClick='removePrato(" + i + ");'>X</a></td></tr> ";
		var valorTotal = document.getElementById("valorPrato").textContent;
        valorTotal = Number(valorTotal) + Number(precos[i]);
      
	
    };
    	document.getElementById('prats').innerHTML += newPtr;
	document.getElementById("valorPrato").innerHTML = valorTotal;
 	  
	document.getElementById('pratos').value = ptrList;
	document.getElementById('valor').value = valorTotal;
	  
}


function removePrato (i) {

    ptrList.splice(i, 1);
	
	var valorTotal = document.getElementById("valorPrato").textContent;
	valorTotal = Number(valorTotal) - precos[i];
	precos.splice(i, 1);

    var newPtr = "";
    // re-display the records from foodList the same way we did it in addToFood()
    for (var i = 0; i < ptrList.length; i++) {
       newPtr += "<tr>" + ptrList[i] +"<td><a href='#' onClick='removeRecord(" + i + ");'>X</a></td></tr>";
	 
    };
    document.getElementById('prats').innerHTML = newPtr;
	document.getElementById("valorPrato").innerHTML = valorTotal;
	
	  
	document.getElementById('pratos').value = ptrList;
	document.getElementById('valor').value = valorTotal;

}





</script>

