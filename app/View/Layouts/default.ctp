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
	</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Smart Meals</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="/pages/about_us" accesskey="1" title="">About</a></li>
				<li><a href="/users/login" accesskey="2" title="">Login</a></li>
				<li><a href="/users/add" accesskey="3" title="">Join</a></li>
			</ul>
		</div>
    </div>
    <div id="banner" class="container"><a href="#" class="image image-centered"><img src="images/pic01.jpg" alt="" /></a></div>
	<div id="wrapper">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
	</div>
	<div id="copyright" class="container">
		<p>Copyright (c) 2013 SmartMeal.com All rights reserved. | Photos by <a href="http://google.com">Fotogrph</a> | Design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a>.</p>
	</div>
</body>
</html>
