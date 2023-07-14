<style>
    .table{
        font-size: 12px;
    }

    img.student-photo:hover{
        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);

        -webkit-transition: -webkit-transform 0.5s ease;
        transition: -webkit-transform 0.5s ease;
        -o-transition: transform 0.5s ease;
        transition: transform 0.5s ease;
        transition: transform 0.5s ease, -webkit-transform 0.5s ease;

        cursor: -webkit-zoom-in;
        cursor: zoom-in;
    }
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/index') ?>">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Edit Setting - <?php echo $info->name;  ?></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Setting: <?php echo htmlspecialchars($info->name);  ?></h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Setting: <?php echo htmlspecialchars($info->name);  ?></div>
                    <div class="panel-body">
                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(validation_errors()): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo form_open('',array('class'=> 'form-horizontal')) ?>
                        <fieldset>

                            <div class="form-group">
                                <label>Setting Name</label>
                                <input readonly="readonly" type="text" class="form-control" placeholder="Enter Ticker Text" name="name" value="<?php echo set_value('name',$info->name); ?>">
                            </div>

							<div class="form-group">
								<label>Value</label>
								<input type="text" class="form-control" placeholder="Enter Ticker Text" name="value" value="<?php echo set_value('value',$info->value); ?>">
							</div>


                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <button type="submit" class="btn btn-primary btn-md btn-block">Update Ticker</button>
                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>


            </div>
        </div><!--/.row-->
    </div>





    <div class="row">
