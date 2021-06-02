<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assessment[]|\Cake\Collection\CollectionInterface $assessment
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompletedAssessment $completedAssessment
 */
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<br>
  <!-- /.col (left) -->
  <div class = "container">
        <div class = "row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><strong>Report Generation Summary</strong></h3>
                <p><strong>View the assessments completed and reports generated within the chosen time frame. You can also search all report generations by Assessment and Date.</strong></p>
            </div>
            <div class="box-body">
              <!-- Date -->

              <!-- /.form group -->

              <!-- Date range -->
               <?php $time = ["All dates","Today","Last seven days","This Month to date","This Year to date"] ?>
             <?php echo $this->Form->create()?>
            <div class = "row">
                <div class = "col-sm-5">
                    <label><strong>Show Statistics for</strong> </label>
             <div class = "form-group">
              <?php  echo $this->Form->select('reports', $time, ['default' => 'M',"class"=>"form-control","name"=>"time"]);?>
             </div>
                </div>
                 <div class = "col-sm-6">
                     <div class="form-group">

                <div class="input-group date">
                  <div class="input-group-addon">

                  </div>

                </div>
                <!-- /.input group -->
              </div>
                </div>
            </div>


              <div class="form-group">

                <div class="input-group date">

                </div>
                <!-- /.input group -->
              </div>


                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->

              <!-- /.form group -->

              <!-- Date and time range -->

               <?php echo $this->Form->submit("Generate Report")?>
              <!-- /.form group -->


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
         <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Assessment Summary</strong></h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                     <th>Assessment/Report Name</th>
                    <th>Assessments Taken</th>
                    <th>Reports Generated</th>
                  </tr>
                  </thead>
                  <tbody>


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
          </div>
          <!-- /.box -->
    <!-- /.content -->


<script>

    $('input[name="Time"]').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
</script>
