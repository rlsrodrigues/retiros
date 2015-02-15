	<?php if ( $retirosAtivos ) : ?>
		<div class="container">  
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<?php echo heading($titleList, 3) ?> 
	                </div>
				</div> 
	            <div class="row">
	            	<div class="col-sm-2"></div>
	                <div class="col-sm-8">
		                <table class="table table-striped">
	                        <thead>
	                            <tr>
	                                <th>Nome</th>
	                                <th>Tema</th>
	                                <th>Início</th>
	                                <th>Fim</th>
	                                <th>Ações</th>
	                            </tr>
	                        </thead>
	                        <tbody>
							<?php foreach ( $retirosAtivos as $retiro ) : ?>
								<tr>
									<td><?php echo $retiro->nome ?></td>	
									<td><?php echo $retiro->tema ?></td>
									<td><?php echo date('d/m/Y', strtotime($retiro->data_inicio)) ?></td>	
									<td><?php echo date('d/m/Y', strtotime($retiro->data_fim)) ?></td>	
									<td>&nbsp;</td>	
								</tr>								
							<?php endforeach; ?>
							</tbody>
						</table>
	                </div>
	            </div>
	        </div>
        </div>
    <?php endif; ?>