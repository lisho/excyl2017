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
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

    <?= $this->Html->css('font-awesome.min.css') ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.min.css"/>
    
    <?= $this->Html->css('homedefault.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script src="https://code.jquery.com/jquery-2.x-git.min.js"></script>    
    
   

</head>
<body class="home">
    
    <?= $this->Flash->render() ?>
    <div class="container clearfix">

        <?= $this->fetch('content') ?>
    </div>

    <?= $this->Html->script('jquery-ui.min.js') ?>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jszip-3.1.3/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.min.js"></script>
    <?= $this->Html->script('mijs.js') ?>

    <footer>
    </footer>
</body>
</html>
