            <?php if ( isset($msgSuccess) || isset($msgError) || isset($validationError) ) : ?>
                <div class="container">
                    <div class="col-sm-12">
                    	<div class="row">
                    		<div class="col-sm-1"></div>            
                    		<div class="col-sm-10">
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
                </div>
            <?php endif; ?>