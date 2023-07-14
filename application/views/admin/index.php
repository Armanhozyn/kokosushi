
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/index') ?>">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

    <div style="display: none" class="panel panel-container">
        <div class="panel-heading">
            Student Information
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><img alt="img" src="<?php echo G::path('image') ?>u1.png">
                        <div class="large"><a href="<?php echo site_url('admin/current_student_list') ?>"><?php echo $totalCurrentStudentCount; ?></a></div>
                        <div class="text-muted">Total Student</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><img alt="img" src="<?php echo G::path('image') ?>u2.png">
                        <div class="large"><a href="<?php echo site_url("admin/pending_student_list"); ?>"><?php echo $totalpendingStudentCount; ?></a></div>
                        <div class="text-muted">Total New Registration</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><img alt="img" src="<?php echo G::path('image') ?>u3.png">
                        <div class="large"><a href="<?php echo base_url('admin/due_student_list'); ?>"><?php echo $totalDueStudent; ?></a></div>
                        <div class="text-muted">Total Due Student</div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->
    </div>
	<div style="min-height: 380px;"></div>


    <div style="display: none" class="panel panel-container">
        <div class="panel-heading">
            Payment Information
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><img alt="img" src="<?php echo G::path('image') ?>p1.png">
                        <div class="large"><?php echo $totalFeeStats - $totalDiscoutStats; ?></div>
                        <div class="text-muted">Total Fees</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><img alt="img" src="<?php echo G::path('image') ?>p2.png">
                        <div class="large"><?php echo (int)$totalPaidStats; ?></div>
                        <div class="text-muted">Total Paid</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><img alt="img" src="<?php echo G::path('image') ?>p3.png">
                        <div class="large"><?php echo ($totalFeeStats - $totalDiscoutStats) - $totalPaidStats ; ?></div>
                        <div class="text-muted">Total Due</div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->
    </div>




    <div class="row">
