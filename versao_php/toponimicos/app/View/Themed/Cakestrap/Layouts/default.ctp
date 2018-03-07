<?php
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
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo __('Emissor de Certificados - UNINORTE'); ?>
        </title>

        <link href='http://fonts.googleapis.com/css?family=Capriola' rel='stylesheet' type='text/css'>

        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('unsemantic-grid-responsive');
            echo $this->Html->css('lib/jquery-ui-1.10.4.custom');
            echo $this->Html->css('lib/jquery.tagit');
            
            echo $this->Html->script('lib/jquery.min');
            echo $this->Html->script('lib/jquery-ui.min');
            echo $this->Html->script('lib/jquery.scrollTableBody-1.0.0');
            echo $this->Html->script('lib/jquery.maskedinput');
            echo $this->Html->script('lib/jshashtable-3.0');
            echo $this->Html->script('lib/jquery.numberformatter-1.2.4.min');
            echo $this->Html->script('lib/jquery.price_format');
            echo $this->Html->script('lib/tag-it.min');
            echo $this->Html->script('core');
            
            echo $this->fetch('meta');
            echo $this->fetch('css');
        ?>
    </head>
    <body>
        <header>
            <?php echo $this->element('menu/menu')?>
        </header>
        <div id="header"></div>

        <div id="container">
            <div id="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>

        <div id="modal-carregando">
            <?php echo $this->Html->image('ic_loading.gif')?>
            <h1>Aguarde! Carregando...</h1>
        </div>

        <div id="modal-mascara"></div>

        <div id="modal-exportacao"></div>
        <br><br>
        <div id="rodape">
            <div id='rod-1'>
                
            </div>
            
            <div id='rod-2'>
                <?php echo $this->Html->image('ic_usuario.png');?>
                <label><?php echo AuthComponent::user('nome') ?></label>
            </div>
        </div>

        <footer></footer>
    </body>
</html>
