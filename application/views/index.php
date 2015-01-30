		<div class="jumbotron">
            <div class="container">
                <div class="row">                
                    <h2>Cadastro de participantes</h2>                 
                </div>
            </div>
        </div>

        <div class="container">   
            <div class="row">
                <div class="col-sm-12">

                	<div class="row">
                		<div class="col-sm-12 ">
                			<?php if(isset($msgSuccess)) { ?>
	                            <div class="alert alert-success">
	                                <?php echo $msgSuccess; ?>
	                                <button id="close-message" type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                            </div>
                			<?php } ?>
                			<?php if($validationError == 1) { ?>
                				<div class="alert alert-danger">
	                                <?php echo validation_errors(); ?>
	                                <button id="close-message" type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                            </div>
                			<?php } ?>
                			<?php if(isset($msgError)) { ?>
                				<div class="alert alert-danger">
	                                <?php echo $msgError; ?>
	                                <button id="close-message" type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                            </div>
                			<?php } ?>
                		</div>
                	</div>

                	<div class="row">

                		<div class="col-sm-2"></div>
            
			            <div class="col-sm-8"> 

			                <?php 
			                	$attr = array('class' => 'form-horizontal', 'id' => 'formCadastro', 'role'=>"form");
			                	echo form_open('index', $attr); 
			                ?>
			                    
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Nome:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputNome); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">E-mail:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputEmail); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Comunidade:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputComunidade); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Telefone Fixo:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputTelefoneFixo); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Celular:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputCelular); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Data de Nascimento:</label>
			                        <div class="col-sm-9">
			                            <input type="date" name="data_nascimento" value="" id="dataNascimento" class="form-control input-text input-data-nascimento" placeholder="Data de Nascimento">
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">1ª Participação no ECD:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputPrimeiroRetiro); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Observações:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_textarea($inputObservacoes); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <div class="col-sm-9">
			                    		<?php echo form_submit('enviar', 'Cadastrar!', "class='btn btn-info center-block'"); ?>
			                        </div>
			                    </div>
			                    
			                
							<?php echo form_close(); ?>

			            </div>
                		
                	</div>

                </div>         
            </div>
        </div>
        <script>
		    jQuery('#formCadastro').validate({
			rules: {
				nome: "required",
				email: "required",
				comunidade: "required",
				telefone_fixo: "required",
				celular: "required",
				data_nascimento: "required"
			},
			messages: {
				nome: "O campo nome precisa ser preenchido",
				email: "O campo email precisa ser preenchido",
				comunidade: "O campo comunidade precisa ser preenchido",
				telefone_fixo: "O campo telefone_fixo precisa ser preenchido",
				celular: "O campo celular precisa ser preenchido",
				data_nascimento: "O campo Data de nascimento precisa ser preenchido"
			}
		});
		</script>