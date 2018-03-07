
</div><div class="tipos view" style="margin-left: 50px;">
<h2><?php echo __('Detalhes do Registro'); ?></h2>
<strong><?php echo __('Codigo:'); ?></strong>
<?php echo h($usuario['Usuario']['id']); ?>
<br><br>
<strong><?php echo __('Nome:'); ?></strong>
<?php echo h($usuario['Usuario']['nome']); ?>		
<br>
<strong><?php echo __('E-mail:'); ?></strong>
<?php echo h($usuario['Usuario']['email']); ?>		
<br>
<strong><?php echo __('Login:'); ?></strong>
<?php echo h($usuario['Usuario']['username']); ?>		
<br>
<strong><?php echo __('Perfil:'); ?></strong>
<?php echo h($usuario['Usuario']['perfil']); ?>		
<br><br>
<strong><?php echo __('Data da Criação:'); ?></strong>
<?php echo h($usuario['Usuario']['created']); ?>
<br>
<strong><?php echo __('Criado por:'); ?></strong>
<?php echo h($usuario['Usuario']['criado_usuario']); ?>
<br><br>
<strong><?php echo __('Data da Modificação:'); ?></strong>
<?php echo h($usuario['Usuario']['modified']); ?>
<br>
<strong><?php echo __('Modificado por:'); ?></strong>
<?php echo h($usuario['Usuario']['modificado_usuario']); ?>
<br><br>
</div>