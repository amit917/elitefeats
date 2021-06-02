<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<br>
<body>
<div class = "container">
 <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Search for clients</h3>
            </div>
            <div class="box-body">
                <div class = "row">
            <div class = "col-sm-5">
                 <div class = "form-group">
                  <?php echo $this->Form->label("Assessment"); ?>
                <?php  echo $this->Form->select("Assessment", $assessment, ['default' => 'm',"class"=>"form-control","name"=>"assessment"]);?>
                 </div>
            </div>
            <div class = "col-sm-5">
                 <div class = "form-group">
                 <?php echo $this->Form->control("Date",["name"=>"Time","class"=>"form-control pull-right","id"=>"daterange-btn"])?>
                 </div>
            </div>
    </div>
    <div class = "row">
            <div class = "col-sm-5">
                 <div class = "form-group">
                <?php  echo $this->Form->control("Client name");?>
                 </div>
            </div>
    </div>
    <div class = "row">
         <div class = "col-sm-5">
            <button type="button" class="btn btn-primary">Search</button>
        </div>
    </div>
</div>
                </div>
                </div>
    
<br>
<div class = "container">
 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Client details</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">

                  <div class="input-group-btn">
                 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>