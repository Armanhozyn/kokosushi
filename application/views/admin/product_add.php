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
            <li class="active">Add Product</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Product</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Product</div>
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

                        <?php echo form_open('admin/product_add',array('class'=> 'form-horizontal')) ?>
                        <fieldset>
							<div class="form-group">
								<label>Display Code</label>
								<input type="text" class="form-control" placeholder="Enter Display Code" name="display_id">
							</div>
							<div class="form-group">
								<label>Product Name</label>
								<input type="text" class="form-control" placeholder="Enter Product Name" name="name">
							</div>
							<div class="form-group">
								<label>Attribute 1</label>
								<input type="text" class="form-control" placeholder="Enter Attribute 1" name="attr1">
							</div>
							<div class="form-group">
								<label>Attribute 2</label>
								<input type="text" class="form-control" placeholder="Enter Attribute 2" name="attr2">
							</div>
							<div class="form-group">
								<label>Product Price</label>
								<input type="number" step="0.01" class="form-control" placeholder="Enter Product Price" name="price">
							</div>
							<div class="form-group">
								<label>Product Category</label>
								<select class="form-control" name="cat_id">
									<option value="">Select</option>
									<?php foreach ($categoryList as $cat): ?>
									<option value="<?php echo $cat['cat_id'] ?>"><?php echo $cat['cat_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>



							<!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 widget-right">
                                    <button type="submit" class="btn btn-primary btn-md btn-block">Add Product</button>
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
