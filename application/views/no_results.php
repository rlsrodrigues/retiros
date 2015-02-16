		<div class="jumbotron">
            <div class="container">
                <div class="row">                
					<?php echo heading('Não foram encontrados resultados', 2) ?> 
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="col-sm-4"></div>
        	<div class="col-sm-4 text-center">
        		<?php if ($keySearch) : ?>
					<h4>Sua busca por esse <strong><?php echo $keySearch; ?></strong>, não retornou nenhum resultado</h4>
				<?php endif; ?>
				<?php if ($buttonLink) : ?>
					<a class="btn btn-info" href="<?php echo $buttonLink ?>">
						voltar
					</a>
				<?php endif; ?>
        	</div>
        </div>