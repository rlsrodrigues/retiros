		<div class="jumbotron">
            <div class="container">
                <div class="row">                
					<?php echo heading('Cadastro de participantes', 2) ?>                   
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

                </div>

                <div class="col-sm-12">

                	<div class="row">
                		<div class="col-sm-2"></div>            
			            <div class="col-sm-8"> 
			            
			                <?php 
			                	$attr = array('class' => 'form-horizontal', 'id' => 'formCadastro', 'role'=>"form");
			                	echo form_open('retiros/index', $attr); 
			                ?>
			                    
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Nome:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputNome); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Tema:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputTema); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Musica:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputMusica); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Início:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputDataInicio); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Fim</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputDataFim); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Local:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputLocal); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Endereço:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_input($inputEndereco); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="billName" class="col-sm-3 control-label">Complemento:</label>
			                        <div class="col-sm-9">
			                            <?php echo form_textarea($inputObservacoes); ?>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <div class="col-sm-9">
			                    		<?php echo form_submit('enviar', 'Criar!', "class='btn btn-info center-block'"); ?>
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
				data_inicio: "required",
				data_fim: "required"
			},
			messages: {
				nome: "O campo nome precisa ser preenchido",
				data_inicio: "O campo início precisa ser preenchido",
				data_fim: "O campo fim precisa ser preenchido"
			}
		});
		</script>