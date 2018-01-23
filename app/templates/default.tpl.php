<?php if(!defined('INCLUDED')) exit('This file cannot be opened directly'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $config['site_title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php echo $html->css('css/bootstrap.min.css'); ?>
    <?php echo $html->css('css/bootstrap-theme.min.css'); ?>
  </head>
  <body>
  	<nav class="navbar navbar-default">
  	<div class="container-fluid">
    	<div class="navbar-header">
      		<a class="navbar-brand" href="#">
      		<div>
      		   <?php $current_player = unserialize($_SESSION[ "current_player"]);
      		         $player = unserialize($_SESSION[ "player" ]);
      		         $email = $player[ $current_player ]->email;
      		   ?>
        	   <img alt="Brand" src="<?php echo( _gravatar($email));?>">
        	   <ul style="list-style-type: none">
        	   <li><?php decorate_session(); ?></li>
        	   <li>Sign out</li>
        	   <ul/>
        	</div>
      		</a>
    	</div>
    </div>
    </nav>
    <!-- This is the content placeholder, pages will be included here -->
     <!-- Begin page content -->
    <main role="main" class="container">
    <?php echo template_content(); ?>
    </main>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php echo $html->js('js/bootstrap.min.js'); ?>
    <?php echo $html->js('js/app.js'); ?>
    
    <footer class="footer">
       <div class="container">
         <span class="text-muted"> Copyright (C) 2018 Michael Erdmann</span>
       </div>
    </footer>
  </body>
</html>
