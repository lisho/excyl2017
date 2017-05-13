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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('datatables.net-bs/css/dataTables.bootstrap.min.css') ?>
    <?= $this->Html->css('datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.x-git.min.js"></script>    
    
    <?= $this->Html->script('mijs.js') ?>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="home">

<header class="row">
    <div class="header-image">
        <?= $this->Html->image('escudo.svg',['style'=>['height:80px']]) ?>
        <h2 style="color:#fff">Ayuntamiento de León</h2>
    </div>
    <div class="header-title">
        <h1>Plan de Empleo Local 2017</h1>
    </div>
</header>

<div class="row">
    <div class="columns large-12">

        <div id="url-rewriting-warning" class="alert url-rewriting">
            <ul>
                <li class="bullet problem">
                    URL rewriting is not properly configured on your server.<br />
                    1) <a target="_blank" href="http://book.cakephp.org/3.0/en/installation.html#url-rewriting">Help me configure it</a><br />
                    2) <a target="_blank" href="http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration">I don't / can't use URL rewriting</a>
                </li>
            </ul>
        </div>
        <?php Debugger::checkSecurityKeys(); ?>
    </div>
</div>

<div class="row">
    <div class="columns centrado large-12">
        <div class="titulo">
            <i class="support glyphicon glyphicon-calendar"></i>
            <h4>EXCYL2017</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="columns centrado large-12">
        <div class="columns centrado large-4 sin_decoracion">
            <a href="" title="">
                <div class="circulo">
                    <i class="support logo glyphicon glyphicon-list-alt"></i>
                </div>  
                <h3>Lista de Candidatos</h3>
            </a>
        </div>

        <div class="columns centrado large-4 sin_decoracion">
            <a href="" title="">
                <div class="circulo">
                     <i class="support logo glyphicon glyphicon-folder-open"></i>
                </div>  
                 <h3>Tribunales</h3>
            </a>
        </div>

        <div class="columns centrado large-4 sin_decoracion">
            <a href="" title="">
                <div class="circulo">
                     <i class="support logo glyphicon glyphicon-check"></i>
                </div>  
                <h3>Resultados Finales</h3>
            </a>
        </div>
    </div>

</div>
 
 <div class="row">
    <div class="columns centrado large-12">
        
    </div>
     
 </div>

    <?= $this->Html->script('datatables.net/js/jquery.dataTables.js') ?>
    <?= $this->Html->script('datatables.net-bs/js/dataTables.bootstrap.min.js') ?>
    <?= $this->Html->script('datatables.net-buttons/js/dataTables.buttons.min.js') ?>
    <?= $this->Html->script('datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>
    <?= $this->Html->script('datatables.net-buttons/js/buttons.flash.min.js') ?>
    <?= $this->Html->script('datatables.net-buttons/js/buttons.html5.min.js') ?>

</body>
</html>
