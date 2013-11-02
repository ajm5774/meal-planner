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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Meal Planner and Tracker</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
		<link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/css/demo_table.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/css/demo_page.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/css/demo_table_jui.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/css/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="all" />

		<script type="text/javascript" charset="utf-8" src="/js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" src="/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="/js/jquery.dataTables.editable.js"></script>
		<script type="text/javascript" charset="utf-8" src="/js/jquery.jeditable.js"></script>
		<script type="text/javascript" charset="utf-8" src="/js/jquery.validate.js"></script>


 		<script type="text/javascript" charset="utf-8" src="/js/jquery-ui-1.10.3.custom.js"></script>
 		<link href="/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Smart Meals</a></h1>
		</div>
		<div id="menu">
			<ul>
				<?php

				if($loggedIn)//This variable is past from the controller (see AppController::beforeFilter)
				{
					$menu = $this->html->tag('li', $this->html->tag('a', 'Inventory', array('href' => '/Inventories/edit', 'accesskey' => '1')));
					$menu .= $this->html->tag('li', $this->html->tag('a', 'Schedule', array('href' => '/schedules/index', 'accesskey' => '2')));
					$menu .= $this->html->tag('li', $this->html->tag('a', 'Settings', array('href' => '/users/settings', 'accesskey' => '3')));
					$menu .= $this->html->tag('li', $this->html->tag('a', 'Help', array('href' => '/pages/help', 'accesskey' => '4')));

					$menu .= $this->html->tag('li', $this->html->tag('a', 'logout', array('href' => '/users/logout', 'accesskey' => '5')));
				}
				else
				{
					$menu = $this->html->tag('li', $this->html->tag('a', 'About', array('href' => '/pages/home', 'accesskey' => '1')));
					$menu .= $this->html->tag('li', $this->html->tag('a', 'Login', array('href' => '/users/login', 'accesskey' => '2')));
					$menu .= $this->html->tag('li', $this->html->tag('a', 'Join', array('href' => '/users/add', 'accesskey' => '3')));
				}

				echo $menu
				?>
			</ul>
		</div>
    </div>
    <?php
			if($this->here === '/users/login')//This variable is past from the controller (see AppController::beforeFilter)
			{

				$image = $this->html->tag('img','', array('src' => '/img/healthy-51.jpg'));
				$link = $this->html->tag('a', $image, array('class' => 'image image-centered'));
				echo $this->html->div('container', $link, array('id' => 'banner'));
			}
	?>
	<div id="wrapper">
			<div class="container_24">
				<?php echo $this->fetch('content'); ?>
			</div>
	</div>
	<div id="copyright" class="container">
		<p>Copyright (c) 2013 SmartMeal.com All rights reserved. | Photos by <a href="http://google.com">Fotogrph</a> | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
	</div>
</body>
</html>
