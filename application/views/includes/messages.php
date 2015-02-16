            <?php if ( isset($msgSuccess) || isset($msgError) || isset($validationError) ) : ?>
                <div class="container">
                    <div class="col-sm-12">
                    	<div class="row">
                    		<div class="col-sm-1"></div>            
                    		<div class="col-sm-10">
                    			<?php if(isset($msgSuccess)) { ?>
    	                            <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">x</a>
                                        <?php echo $msgSuccess; ?>
    	                            </div>
                    			<?php } ?>
                    			<?php if($validationError == 1) { ?>
                    				<div class="alert alert-danger">
    	                                <a href="#" class="close" data-dismiss="alert">x</a>
                                        <?php echo validation_errors(); ?>
    	                            </div>
                    			<?php } ?>
                    			<?php if(isset($msgError)) { ?>
                    				<div class="alert alert-danger">
    	                                <a href="#" class="close" data-dismiss="alert">x</a>
                                        <?php echo $msgError; ?>
    	                            </div>
                    			<?php } ?>
                    		</div>
                    	</div>
                    </div>
                </div>
            <?php endif; ?>