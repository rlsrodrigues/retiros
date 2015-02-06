<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
		<meta name="author" content="Renato Rodrigues - Rlsrodrigues">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo link_tag('assets/css/bootstrap.css'); ?>
        <?php echo link_tag('assets/css/retiros-theme.css'); ?>
        <?php echo link_tag('assets/css/custom_retiros.css'); ?>
        <?php echo link_tag('assets/css/screen.css'); ?>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.mask.min.js"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script>

            $(document).ready(function(){

                $('#close-message').click(function(){
                    $(this).parent().fadeOut('slow');
                });

            });

		    $('#telefoneFixo').mask('(00) 0000-0000');
		    $('#celular').mask('(00) 0000-00000');
            $('#dataNascimento').mask('00-00-0000');

        </script>

	</head>
	<body>
		
		<!-- Fixed navbar --> 
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">E.C.D</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo base_url(); ?>">Cadastro</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>retiros">Retiros</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url(); ?>index/login">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>