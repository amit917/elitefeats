<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-2">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h4>My Groups</h4>
                    <p>View list of my groups.</p>

                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

                <a href="<?php echo $this->Url->build([
                    "controller" => "groups",
                    "action" => "index"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-2">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h4>My clients</h4>
                    <p>View list of my clients.</p>

                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

                <a href="<?php echo $this->Url->build([
                    "controller" => "clients",
                    "action" => "index"]); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create new client and add to the group.</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create()?>
            <form role="form">
              <div class="box-body">
                  <div class = "row">
                      <div class = "col-sm-4">
                        <div class="form-group">
                           <?php echo $this->Form->control("First_name",['class'=>'form-control','required' => true])?>
                      </div>
                       </div>
                       <div class = "col-sm-4">
                        <div class="form-group">
                           <?php echo $this->Form->control("Last_name",['class'=>'form-control','required' => true])?>
                      </div>
                       </div>
                       <div class = "col-sm-4">
                        <div class="form-group">
                           <?php echo $this->Form->control("Email",['class'=>'form-control','type'=>'Email','required' => true])?>
                      </div>
                       </div>
                  </div>
              
     <?php echo $this->Form->submit('Create new client', ['name' => 'submit'])?>
     <div class="box-header">
              <h3 class="box-title">Add client to existing group by ticking the select group  box adjacent to the group name and description</h3>
              </div>
              <?php echo $this->Form->submit('Add client to group', ['name' => 'submit','class'=>'btn btn-primary'])?>
              <table class="table table-hover">
                <tr>
                  <th>Group name</th>
                  <th>Group description</th>
                  <th>Select groups</th>
                </tr>
                <tbody>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= h($group->group_name) ?></td>
                <td><?= h($group->group_des) ?></td>
               <td>  <?php echo $this->Form->control('Select group', ['name'=>$group->group_id,'value'=>$group->group_id,'type' => 'checkbox','checked'=>false]);?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>

               
              </table>
            </div>
            <!-- /.box-body -->
             <div class="box-footer">
           <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
              </div>
          </div>
          <!-- /.box -->
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
                
               


             
            </form>
          </div>
