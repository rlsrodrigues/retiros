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
	            	<div class="col-sm-1"></div>
	                <div class="col-sm-10">
		                <table class="table table-striped">
	                        <thead>
	                            <tr>
	                                <th>Nome</th>
	                                <th>Tema</th>
	                                <th>Início</th>
	                                <th>Fim</th>
	                                <th>&nbsp;</th>
	                            </tr>
	                        </thead>
	                        <tbody>
							<?php foreach ( $retirosAtivos as $retiro ) : ?>
								<tr>
									<td>
										<a href="<?php echo base_url() . 'retiros/editar?id=' . $retiro->id ?>">
											<?php echo $retiro->nome ?>
										</a>
									</td>	
									<td><?php echo $retiro->tema ?></td>
									<td><?php echo date('d/m/Y', strtotime($retiro->data_inicio)) ?></td>	
									<td><?php echo date('d/m/Y', strtotime($retiro->data_fim)) ?></td>	
									<td>
										<?php 
											echo form_open('retiros/deletar');
											echo form_hidden('id', $retiro->id);
											echo form_submit('deletar', 'Deletar', 'class="btn btn-danger center-block"');
											echo form_close(); 
										?>
									</td>	
								</tr>								
							<?php endforeach; ?>
							</tbody>
						</table>
	                </div>
	            </div>
	        </div>
        </div>
    <?php endif; ?>