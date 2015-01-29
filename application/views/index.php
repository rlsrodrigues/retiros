		<div class="all">

			<h1><?php echo $title; ?></h1>

			<div class="form">
				<?php 

					$this->load->helper('form');

					echo form_open('index/cadastro');

					echo form_input($inputNome);
					echo form_input($inputEmail);
					echo form_input($inputComunidade);
					echo form_input($inputTelefoneFixo);
					echo form_input($inputCelular);
					echo form_input($inputDataNascimento);

					echo form_submit('enviar', 'Enviar!');

					echo form_close();

				?>
			</div>
			
		</div>
