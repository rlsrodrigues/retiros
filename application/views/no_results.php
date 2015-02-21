		<div class="jumbotron">
            <div class="container">
                <div class="row">                
					<?php echo heading('Não foram encontrados resultados', 2) ?> 
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="row">
        		<div class="col-sm-3"></div>
	        	<div class="col-sm-6 text-center">
	        		<?php if ($message) : ?>
						<?php echo heading($message, 2) ?>
					<?php endif; ?>
	        	</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-3"></div>
	        	<div class="col-sm-6 text-center">
	        		<?php if (isset($backButton) && $backButton) : ?>
						<a class="btn btn-info" href="<?php echo $backButtonLink ?>">
							Voltar
						</a>
					<?php endif; ?>
					<?php if (isset($addButton) && $addButton) : ?>
						<a class="btn btn-info" href="<?php echo $addButtonLink ?>">
							Começar Agora!
						</a>
					<?php endif; ?>
	        	</div>
        	</div>
        </div>