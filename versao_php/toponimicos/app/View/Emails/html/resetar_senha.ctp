<?php
/**
 *
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
 * @package       app.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<p>
	Caro(a), <?php echo $usuario; ?>!
</p>
<p>
	<!--
		Recentemente foi solicitado a redefinição da senha para 
		acesso no Sistema de Emissão de Certificados da Instituição.
	-->
	Segue seu acesso ao Sistema Atlas Toponomico
</p>
<br>
<p>
	O seu usuário de acesso é: <strong><?php echo $login; ?></strong>
</p>
<p>
	A <!-- nova -->sua senha temporária da sua conta é: <strong><?php echo $senha; ?></strong>
</p>
<p>
	Acesse o sistema com esta senha temporária e altere imediatamente.
</p>
<p>
	Este é um e-mail automático disparado pelo sistema. Favor não respondê-lo, pois esta conta não é monitorada.
</p>