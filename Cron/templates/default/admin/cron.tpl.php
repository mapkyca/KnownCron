<?php

    $cron = \Idno\Core\site()->plugins()->get('Cron');
?>
<div class="row">

    <div class="col-md-10 col-md-offset-1">
        <h1>Cron</h1>
        <?=$this->draw('admin/menu')?>
    </div>

</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="/admin/cron/" class="form-horizontal" method="post">
	    <?php if ($code = $cron->getCode()) { ?>
	    
	    <div class="control-group">
                <div class="controls">
                    <h2>
                        <strong>Cron code:</strong> <?= $code; ?>
                    </h2>
		    <p>Place this code in your cron script to enable cron events.</p>
		    <hr />
                    <p>
                        <input type="submit" class="btn btn-large btn-danger" value="Disable cron" />
                    </p>
                </div>
            </div>
	    
	    <?php } else { ?>
	    
            <div class="control-group">
                <div class="controls">
                    <input type="submit" class="btn btn-large btn-primary" value="Enable cron" />
                </div>
            </div>
	    <?php } ?>
            <?= \Idno\Core\site()->actions()->signForm('/admin/cron/')?>
        </form>
    </div>
</div>