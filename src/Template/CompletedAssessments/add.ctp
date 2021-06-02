<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompletedAssessment $completedAssessment
 */
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script>
  $( function() {
    $( "#custom-start" ).datepicker({
  dateFormat: "dd-mm-yy"
});
     $( "#custom-end" ).datepicker({
  dateFormat: "dd-mm-yy"
});
  } );
  </script>

</head>
<br>
     <div class = "container">
        <div class = "row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><strong>Account Activity Overview</strong></h3>
              <p> View the assessments completed and reports generated within the chosen time frame.</p>
            </div>
            <div class="box-body">
              <!-- Date -->

              <!-- /.form group -->

              <!-- Date range -->
             <?php echo $this->Form->create()?>
             <div class = "row">
             <div class = "col-sm-5">
                 <label><strong>Select Report</strong></label>

             <div class = "form-group">
             <?php  $reports = ["Summary","Report Generation Summary"] ?>
              <?php  echo $this->Form->select('size', $reports, ['default' => '',"class"=>"form-control","name"=>"reports"]);?>
             </div>
             </div>
             <div class = "col-sm-5">
                 <label><strong>Assessment name</strong></label>
             <div class = "form-group">

              <?php  echo $this->Form->select('assessment', $assessment, ["class"=>"form-control"]);?>
             </div>
             </div>
             </div>
            <div class = "row">
                <div class = "col-sm-5">
                    <div class="form-group">
                        <label><strong>Custom start date:</strong></label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php echo $this->Form->control("",["name"=>"custom-start","class"=>"form-control pull-right","id"=>"custom-start"])?>
                </div>
                <!-- /.input group -->
              </div>
                </div>
                <div class = "col-sm-5">
                    <div class="form-group">
                        <label><strong>Custom end date:</strong></label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php echo $this->Form->control("",["name"=>"custom-end","class"=>"form-control pull-right","id"=>"custom-end"])?>
                </div>
                <!-- /.input group -->
              </div>
                </div>

            </div>
            <?php $timeframe = ["All","Today","Last seven days","Month to date","Year to date"];?>
             <div class = "row">
                 <div class = "col-sm-3">
                    <div class="form-group">
                        <label><strong>Time Frame:</strong></label>
                <div class="input-group date">
                  <?php  echo $this->Form->select('timeframe', $timeframe, ['default' => '',"class"=>"form-control","name"=>"time","id"=>"daterange-btn1"]);?>
                </div>
                <!-- /.input group -->
              </div>
                </div>

                 </div>





                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->

              <!-- /.form group -->

              <!-- Date and time range -->

               <?php echo $this->Form->submit("Search")?>
              <!-- /.form group -->


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
         <?php if(isset($show)){?>
         <div class="box box-info">
            <div class="box-header with-border">
                <h3  class="box-title" ><strong> Account Summary Report:<?php echo " ".$assessment_name; ?></strong></h3>
                <br>
                <?php if(isset($name)) { ?>
                    <?php  $start =   date("d-m-Y", strtotime($start));?>

                        <?php  $end =   date("d-m-Y", strtotime($end));?>
                        <b><?php echo "From"." ".$start." "."To"." ".$end;?></b>


                <?php }?>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>

                <?php  if (isset($report)) { ?>
                    <tr>
                        <th>Date</th>
                        <th>Report Name</th>
                        <th>Adminstrator</th>
                        <th>Generated for</th>
                    </tr>
                <?php } ?>

                <tr>
                    <th>Assessment/Report Name</th>
                    <th>Assessments Taken</th>
                    <th>Reports Generated</th>
                </tr>


                  </thead>
                  <tbody>
                     <tr>
                         <?php if(isset($name)) { ?>
                             <?php foreach ($name as $value){?>
                                 <td><?php echo $value;?></td>
                                 <?php }?>
                    <td><?php echo $total;?></td>

                    <td>
                        <?php echo $total;?>
                    </td>
                         <?php }?>
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-footer -->
          </div>

<?php }?>
     </div>

          <!-- /.box -->
    <!-- /.content -->


