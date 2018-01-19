<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       Puzzle Food 
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
		<?php
			$session = $this->request->session();
	
			if ($session->read('Auth.User.permissao') == 1){
				echo '<h1><a href="http://irias.com.br/inicio">'.$this->Html->image('logo-pfood.png',['class' => 'img-responsive']).'</a></h1>';
				echo '</li>
        				</ul>
        					<div class="top-bar-section">
            						<ul class="right">
								<li><a href="http://irias.com.br/consumidores/logout">Sair</a></li>
							</ul>
					        </div>';
			}else if ($session->read('Auth.User.id') == null){
				echo '<h1><a href="#">'.$this->Html->image('logo-pfood.png',['class' => 'img-responsive']).'</a></h1>';
				echo '</li>
        				</ul>';
        		
			}else if ($session->read('Auth.User.permissao') == 0){
				echo '<h1><a href="http://irias.com.br/filapedidos">'.$this->Html->image('logo-pfood.png',['class' => 'img-responsive']).'</a></h1>';
				echo '</li>
        				</ul>
        					<div class="top-bar-section">
            						<ul class="right">
								<li><a href="http://irias.com.br/estabelecimentos/logout">Sair</a></li>
   							</ul>
       						 </div>';
			}
				
		?>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
