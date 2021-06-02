<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="col-md-10">
    <!-- Custom Tabs (Pulled to the right) -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Client details</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">Pending assessment </a></li>
            <li><a href="#tab_2-3" data-toggle="tab">Completed assessment</a></li>
            <li><a href="#tab_2-4" data-toggle="tab">Assign assessment</a></li>
            <li><a href="#tab_3-2" data-toggle="tab">Email</a></li>
            <li class="pull-left header"><i class="fa fa-th"></i> Clients name <?php echo $clients->First_name?></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">

                <div class = "row">
                     <?php echo $this->Form->create()?>
                    <div class = "col-sm-4">
                        <div class = "form-group">
                            <?php
                            echo $this->Form->control('First_name',['class'=>'form-control','value'=>$clients->First_name]);?>
                        </div>
                    </div>
                    <div class = "col-sm-4">
                        <div class = "form-group">
                            <?php echo $this->Form->control('Last_name',['class'=>'form-control','value'=>$clients->Last_name]);?>
                        </div>
                    </div>
                    <div class = "col-sm-4">
                        <div class = "form-group">
                            <?php echo $this->Form->control('Email',['class'=>'form-control','value'=>$clients->Email]);?>
                        </div>

                    </div>
                </div>

                    <?php echo $this->Form->submit('Make changes');?>

            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Assessment name</th>
                        <th scope="col">Assign assessment</th>
                        <th scope="col">Quantity</th>

                    </tr>
                    </thead>
                    <?php echo $this->Form->create()?>
                    <tbody>
                    <?php foreach ($purchasedAssessments as $purchasedAssessment): ?>

                        <tr>
                            <td><?= $purchasedAssessment['Assessment']['assessment_name'] ?></td>
                            <td>  <?php echo $this->Form->control('Select assessment', ['name'=> $purchasedAssessment['assessment_id'],'value'=> $purchasedAssessment['assessment_id'],'type' => 'checkbox']);?></td>
                            <td><?= $purchasedAssessment['quantity']?></td>


                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo $this->Form->submit('Assign assessment',['name' => 'submit'])?>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Assessment name</th>
                        <th scope="col">Date assigned</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pending_assessment as $pending_assessments): ?>

                        <tr>
                            <td><?= $pending_assessments['Assessment']['assessment_name'] ?></td>
                            <td><?= $pending_assessments['date']?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
<!-- END CUSTOM TABS -->
