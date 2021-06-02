<div class="row" style="margin:5px">
    <div class="col-sm-3 col-6">
        <!-- small card -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h2><b>My account</b></h2>
            </div>
            <div class="icon">
                <i class="glyphicon glyphicon-folder-open" style="color:white; font-size:50px; padding:15px;"></i>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            
            <a href="#" class="small-box-footer">
                Access <i class="glyphicon glyphicon-arrow-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-sm-3 col-6">
        <!-- small card -->
        <div class="small-box bg-green">
            <div class="inner">
                <h2><b>My clients</b></h2>
                
            </div>
            <div class="icon">
                <i class="glyphicon glyphicon-user" style="color:white; font-size:50px; padding:15px;"></i>
            </div>
            <a href="<?php echo $this->Url->build([
                "controller" => "Clients",
                "action" => "index"]); ?>" class="small-box-footer">
                Access <i class="glyphicon glyphicon-arrow-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-sm-3 col-6" >
        <!-- small card -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h2><b>My groups</b></h2>
            </div>
            <div class="icon">
                <i class="fa fa-users" style="color:white; font-size:50px; padding:15px;"></i>
            </div>
            <a href="<?php echo $this->Url->build([
                "controller" => "Groups",
                "action" => "index"]); ?>" class="small-box-footer"> Access <i class="glyphicon glyphicon-arrow-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-sm-3 col-6">
        <!-- small card -->
        <div class="small-box bg-red">
            <div class="inner">
                <h2><b>Assessments</b></h2>
                <br>
                
            </div>
            <div class="icon">
                <i class="fa fa-bar-chart-o" style="color:white; font-size:50px; padding:15px;"></i>
            </div>
            <a href="#" class="small-box-footer">
                Access <i class="glyphicon glyphicon-arrow-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
</div>
<div class = "row" style="margin:5px">
     <div class="col-sm-3 col-6" >
        <!-- small card -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h2><b>Resources</b></h2>

            </div>
            <div class="icon">
                <i class="fa fa-briefcase" style="color:white; font-size:50px; padding:15px;"></i>
            </div>
           <a href="#" class="small-box-footer">
                Access <i class="glyphicon glyphicon-arrow-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-3 col-6" >
        <!-- small card -->
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class=" fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reports generated</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <div class="col-sm-3 col-6" >
        <!-- small card -->
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Completed assessments</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    <div class="col-sm-3 col-6" >
        <!-- small card -->
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending</span>
              <span class="info-box-number">100</span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>
    
</div>
<div class="row" style="padding:15px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"style="background-color: orange">
              <h2 class="box-title" style="color:white">Assessments info</h2>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
    <thead>
      <tr>
        <th>Assessment name</th>
        <th>Purchased</th>
        <th>Available</th>
        <th>Completed</th>
        <th>Pending</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Module 1 - Engineering Your Success in Sport</td>
        <td>12</td>
        <td>6</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 2 - Making The Athlete - Coach Relationship A Winning Partnership</td>
        <td>10</td>
        <td>4</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 3 - Achieving Peak Performance</td>
        <td>-</td>
        <td>-</td>
        <td><a href="">-</a></td>
        <td><a href="">-</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 4 - Winning The Mental Game</td>
        <td>22</td>
        <td>8</td>
        <td><a href="">10</a></td>
        <td><a href="">4</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 1 Tools - Goal setting. Goal achieveing. Making it happen</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 1 Tools - Knowledge, skills, resources audit</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 1 Tools- Strengths and Weaknesses</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 2 Tools - Coach audit</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 2 Tools - Effective Communication</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 2 Tools - Keeping it real. Athlete coach compatability</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 3 Tools - Foundational attributes</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 3 Tools - Perma</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 3 Tools - The ideal perfoprmance state</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 3 Tools - The performance profile</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 4 Tools - Cognitive fitness</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 4 Tools - Mental toughness</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 4 Tools - Priming and reframing</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
      <tr>
        <td>Module 4 Tools - Scripting self talk</td>
        <td>12</td>
        <td>3</td>
        <td><a href="">4</a></td>
        <td><a href="">2</a></td>
        <td><a href="">Buy More</a></td>
      </tr>
    </tbody>
  </table>
  
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class = "content">
 <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Visitors Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="world-map" style="height: 325px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visits</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New clients</span>
              <span class="info-box-number">20</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
          <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New reports generated today</span>
              <span class="info-box-number">20</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
          <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New groups created</span>
              <span class="info-box-number">20</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>

   




                
        


    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

        <!-- Map box -->


        <!-- /.box -->

        <!-- solid sales graph -->

        <!-- /.box -->

        <!-- Calendar -->
        
<!-- /.row (main row) -->

</section>
<!-- /.content -->


<!-- Morris chart -->
<?php echo $this->Html->css('AdminLTE./bower_components/morris.js/morris', ['block' => 'css']); ?>
<!-- jvectormap -->
<?php echo $this->Html->css('AdminLTE./bower_components/jvectormap/jquery-jvectormap', ['block' => 'css']); ?>
<!-- Date Picker -->
<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min', ['block' => 'css']); ?>
<!-- Daterange picker -->
<?php echo $this->Html->css('AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker', ['block' => 'css']); ?>
<!-- bootstrap wysihtml5 - text editor -->
<?php echo $this->Html->css('AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min', ['block' => 'css']); ?>

<!-- jQuery UI 1.11.4 -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-ui/jquery-ui.min', ['block' => 'script']); ?>
<!-- Morris.js charts -->
<?php echo $this->Html->script('AdminLTE./bower_components/raphael/raphael.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/morris.js/morris.min', ['block' => 'script']); ?>
<!-- Sparkline -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-sparkline/dist/jquery.sparkline.min', ['block' => 'script']); ?>
<!-- jvectormap -->
<?php echo $this->Html->script('AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en', ['block' => 'script']); ?>
<!-- jQuery Knob Chart -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery-knob/dist/jquery.knob.min', ['block' => 'script']); ?>
<!-- daterangepicker -->
<?php echo $this->Html->script('AdminLTE./bower_components/moment/min/moment.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap-daterangepicker/daterangepicker', ['block' => 'script']); ?>
<!-- datepicker -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min', ['block' => 'script']); ?>
<!-- Bootstrap WYSIHTML5 -->
<?php echo $this->Html->script('AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min', ['block' => 'script']); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php echo $this->Html->script('AdminLTE.pages/dashboard', ['block' => 'script']); ?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->Html->script('AdminLTE.demo', ['block' => 'script']); ?>

<?php $this->start('scriptBottom'); ?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<?php  $this->end(); ?>
