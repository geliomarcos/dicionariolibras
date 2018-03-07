<div class="tipos view" style="margin-left: 50px;">
<h2><?php echo __('Detalhes do Registro'); ?></h2>
<strong><?php echo __('Codigo:'); ?></strong>
<?php echo h($tipo['Municipio']['id']); ?>
<br><br>
<strong><?php echo __('Nome:'); ?></strong>
<?php echo h($tipo['Municipio']['nome']); ?>		
<br>
<strong><?php echo __('UF:'); ?></strong>
<?php echo h($tipo['Municipio']['uf']); ?>		
<br>
<strong><?php echo __('Area Territorial:'); ?></strong>
<?php echo h($tipo['Municipio']['area_territorial']); ?>		
<br>
<strong><?php echo __('População:'); ?></strong>
<?php echo h($tipo['Municipio']['populacao']); ?>		
<br>
<strong><?php echo __('Localização:'); ?></strong>
<?php echo h($tipo['Municipio']['localizacao']); ?>		
<br><br>
<strong><?php echo __('Data da Criação:'); ?></strong>
<?php echo h($tipo['Municipio']['created']); ?>
<br>
<strong><?php echo __('Criado por:'); ?></strong>
<?php echo h($tipo['Municipio']['criado_usuario']); ?>
<br><br>
<strong><?php echo __('Data da Modificação:'); ?></strong>
<?php echo h($tipo['Municipio']['modified']); ?>
<br>
<strong><?php echo __('Modificado por:'); ?></strong>
<?php echo h($tipo['Municipio']['modificado_usuario']); ?>
<br><br>
</div>