<style>	
	.bloco-sistema {
		position: absolute;
		margin: 0;
		left: 0px;
		top: 0px;
		bottom: 0px;
		width: 100%;
		height: 100%;
		background-color: #CCC;
	}
	/* LOGIN */
	.bloco-login {
	    width: 320px;
	    border: 1px solid #d3d3d3;
	    background-color: #FFFFFF;
	    margin: 0 auto;
	    padding: 10px;
	    position: absolute;
	    z-index: 9999;
	    left: 39%;
	    top: 0;
	    bottom: 0;
	}
	label {
		font-family: 'Open Sans', sans-serif;
		color: #173e73;
		font-size: 13px;
		padding: 0 0;
	}
	div {
		display: block;
	}
	.item p {
		font-family: 'Quicksand', sans-serif;
		color: #173e73;
		font-weight: 700;
		font-size: 16px;
		text-align: center;
	}
	p {
		display: block;
		-webkit-margin-before: 1em;
		-webkit-margin-after: 1em;
		-webkit-margin-start: 0px;
		-webkit-margin-end: 0px;
	}
	.form-login {
	    width: 100%;
	    margin-top: 50px;
	}
	.form-login .field {
	    margin: 10px 20px;
	}	
	.form-login .field-buttons {
	    margin: 10px 24px;
	    text-align: center;
	}	
	#btnLogin {
		-webkit-transform: skew(-20deg, 0deg);
		background: #173E73;
		padding: 15px 25px;
		width: 70%;
		color: #FFF;
		font-weight: bold;
		border: none;
		font-size: 14px;
		text-align: center;
		cursor: pointer;
		font-family: 'Open Sans', sans-serif;
		margin-top: 10px;
		margin-bottom: 5px;
	}
	.form-login .field input[type="text"], .form-login .field input[type="password"] {
	    width: 96%;
	    padding: 5px;
	}
	/* FIM LOGIN */
</style>
<div class="bloco-sistema"></div>
<div class="bloco-login">
	<?php echo $this->Form->create('Usuario', array('inputDefaults' => array('label' => false),'action' => 'login', 'class' => 'form-login')); ?>	
	<div>
		<center><?php echo $this->Html->image('logo1.png', array('width'=>'180px')); ?></center>
		<div class="item"><p>Atlas Toponímico</p></div>
	</div>
	<br>
	<div><center><?php echo $this->Session->flash(); ?></center></div>
	<div class="field">	
		<label for="usuarios_login_label">Login:</label>
		<?php echo $this->Form->input('username', array('placeholder' => 'Nome do usuário')); ?>
	</div>	
	<div class="field">
		<label for="usuarios_senha_label">Senha:</label>
		<?php echo $this->Form->input('senha', array('placeholder' => 'Senha do usuário', 'type' => 'password')); ?>
	</div>
	<div class="item" style="text-align: center"><button id="btnLogin" type="submit"><span>ACESSAR</span></button></div>
	<?php echo $this->Form->end(); ?>
</div>