<?
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<!--
    Autor: Ruberson Maia
    Email: ruberson.maia@uninorteac.com.br / rubersonramon7@gmail.com
-->

<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo __('Atlas Toponímico'); ?>
        </title>

        <link href='http://fonts.googleapis.com/css?family=Capriola' rel='stylesheet' type='text/css'>
		
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->Html->css('bootstrap');
			echo $this->Html->css('font-awesome');
			echo $this->Html->css('dataTables.bootstrap.min');
			echo $this->Html->css('styles');
			
			echo $this->Html->script('jquery');
			echo $this->Html->script('bootstrap.min');
			echo $this->Html->script('mascara');
			echo $this->Html->script('nicEdit');
			echo $this->Html->script('jquery.dataTables.min');
			echo $this->Html->script('dataTables.bootstrap.min');			 
		?>
		<script>
			$(function () {
				$('.dropdown-toggle').dropdown();
			}); 
		</script>
    </head>
    <body>
        <div id="header">
			<div id="top-nav" class="navbar navbar-default navbar-static-top" style="min-height:50px;background-color:#173E73;">
				<div class="container">
					<?php if (AuthComponent::user('perfil') == 'admin') { ?>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav"> 
								<li id="links-menu"><a href=<?php echo Router::url('/toponimicos/')?>><span>Início</span></a></li>                      
								<li id="links-menu"><a href=<?php echo Router::url('/municipios/')?>><span style="font-size:16px !important;margin-top:5px !important;">Municipios</span></a></li>                
								<li id="links-menu"><a href=<?php echo Router::url('/toponimicos/index2')?>><span>Toponímico</span></a></li>                      
								<li id="links-menu"><a href=<?php echo Router::url('/usuarios/')?>><span style="font-size:16px !important;margin-top:5px !important;">Usuários</span></a></li>	        
								<li id="links-menu"><a href=<?php echo Router::url('/toponimicos/sobre')?>><span style="font-size:16px !important;margin-top:5px !important;">Sobre</span></a></li>	        
							</ul>
							<ul class="nav navbar-nav navbar-right">						
								<li id="links-menu" style="float: left"><a href=<?php echo Router::url('/usuarios/alterar_senha')?>><span>Alteração de Senha</span></a></li>                   
								<li id="links-menu" style="float: right" class='last'><a href=<?php echo Router::url('/usuarios/logout')?>><span>Sair</span></a></li>
							</ul>
						</div>
					<?php } else if (AuthComponent::user('perfil') == 'user') { ?>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav"> 
								<li id="links-menu"><a href=<?php echo Router::url('/toponimicos/')?>><span>Início</span></a></li>                      
								<li id="links-menu"><a href=<?php echo Router::url('/municipios/')?>><span style="font-size:16px !important;margin-top:5px !important;">Municipios</span></a></li>                
								<li id="links-menu"><a href=<?php echo Router::url('/toponimicos/index2')?>><span>Toponímico</span></a></li>                      
							</ul>
							<ul class="nav navbar-nav navbar-right">						
								<li id="links-menu" style="float: left"><a href=<?php echo Router::url('/usuarios/alterar_senha')?>><span>Alteração de Senha</span></a></li>                   
								<li id="links-menu" style="float: right" class='last'><a href=<?php echo Router::url('/usuarios/logout')?>><span>Sair</span></a></li>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

        <div id="container">
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->fetch('content'); ?>
				<br><br>
            </div>
        </div>
        <div id="modal-carregando">
            <?php echo $this->Html->image('ic_loading.gif')?>
            <h1>Aguarde! Carregando...</h1>
        </div>
        <div id="modal-mascara"></div>
        <div id="modal-exportacao"></div>
        <div id="rodape">
            <div id='rod-1'></div>            
            <div id='rod-2'>
                <?php echo $this->Html->image('ic_usuario.png');?>
                <label>
                    <?php 
                        if (AuthComponent::user('nome') != null) {
                            echo CakeSession::read('Auth.User.nome');
                        } else {
							
                        } 
                    ?>
                </label>
            </div>
        </div>

        <footer></footer>
    </body>
</html>