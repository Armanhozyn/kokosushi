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
            <li class="active">Category List</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category List</h1>
        </div>
    </div><!--/.row-->

    <div class="panel panel-container">
        <div class="row">
            <div class="col-sm-12">
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-info">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <div style="margin-bottom: 10px;">
                    <a href="<?php echo site_url("admin/category_add") ?>" class="btn btn-success">Add Category</a>
                </div>
                <table class="table table-striped table-responsive table-hover">
                    <tr>
                        <th>#</th>

                        <th>Category  ID</th>
                        <th>Category Name Text</th>
                        <th>Serial</th>
                        <th>Action</th>
                        <th>Status</th>

                    </tr>

                    <?php
                    $sl= 1;
                    foreach ($list as $item): ?>
                        <tr>
                            <td><?php echo $sl; ?></td>

                            <td><?php echo $item['cat_id']; ?></td>
                            <td><?php echo $item['cat_name']; ?></td>
                            <td><?php echo $item['order']; ?></td>




                            <td>
                                <a class="btn btn-success btn-xs btn-block" href="<?php echo site_url("admin/category_edit/{$item['cat_id']}"); ?>">Edit</a>
                                <a onclick='return confirm("Are you sure?")'  class="btn btn-danger btn-xs btn-block" href="<?php echo site_url("admin/category_delete/{$item['cat_id']}"); ?>">Delete</a>
                            </td>
                            <td><?php echo "<span class='badge {$this->g->getAlertLebelByCode($item['status'])}'>{$this->g->getStatusByCode($item['status'])}</span>"; ?></td>
                        </tr>
                        <?php
                        $sl++;
                    endforeach; ?>
                </table>
                <div><?php echo $links; ?></div>
            </div>
        </div><!--/.row-->
    </div>





    <div class="row">
