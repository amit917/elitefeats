<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership[]|\Cake\Collection\CollectionInterface $memberships
 */
?>
<br>
<div class="col-lg-3 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-green-gradient">
              <div class="inner">
                  <h3>My groups</h3>
                  <p>Click to view your groups</p>
              </div>
              <div class="icon">
                  <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo $this->Url->build([
                  "controller" => "groups",
                  "action" => "index"]); ?>" class="small-box-footer">My groups <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
<div class = "container">
    <div class="card">
  <div class="card-header bg-green-gradient">
       <?php $session = $this->getRequest()->getSession();
                   $name = $session->read('group_name');?>
                   <?php echo 'Group name:'." ".$name;?>
  </div>
  <div class="card-body">
    <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Group members</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">My clients</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Create new clients</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>Group members</h3>
          <table class="table" id = "example2" >
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    
    <tbody>
   <?php foreach($array as $value){?>

            <?php $query = $value;?>
            <?php $data = $query->toArray();?>
          <?php  foreach($data as $value1){ ?>
            
            <tr>
        <td><?php echo $value1['First_name']?></td>
        <td><?php echo $value1['Last_name']?></td>
        <td><?php echo $value1['Email']?></td>
       
      </tr>
          <?php }?>
           <?php }?>
      
      
     
    </tbody>
  </table>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>My clients</h3>
       <?php echo $this->Form->create('',['name'=>'myForm']);?>
       
       <div class="float-right"><?php echo $this->Form->submit("Add members to the group",['name' => 'submit']);?></div><br>
     <table class="table table-hover" id = "example">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('First_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Add members') ?></th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $this->Number->format($client->id) ?></td>
                <td><?= h($client->First_name) ?></td>
                <td><?= h($client->Last_name) ?></td>
                <td><?= h($client->Email) ?></td>
                 <td>  <?php echo $this->Form->control('Select members', ['name'=>$client->id,'value'=>$client->id,'type' => 'checkbox']);?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <?php echo $this->Form->end();?>
    



    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Create new client and add to the group</h3>
        <div class="clients form large-9 medium-8 columns content">
    <?=  $this->Form->create('',['name'=>'myForm']) ?>
    <fieldset>
       
        <div class = "row">
        <div class = "col-sm-4">
        <div class = "form-group">
        <?php
            echo $this->Form->control('First_name',['class'=>'form-control','required' => true]);?>
        </div>
        </div>
        <div class = "col-sm-4">
            <div class = "form-group">
           <?php echo $this->Form->control('Last_name',['class'=>'form-control','required' => true]);?>
            </div>
        </div>
        <div class = "col-sm-4">
            <div class = "form-group">
           <?php echo $this->Form->control('Email',['class'=>'form-control','type'=>'email','required' => true]);?>
            </div>
        </div>
        </div>
        <?php echo $this->Form->control('id',['class'=>'form-control', 'value'=>$group_members,'type'=>'hidden']);?>
        <?php echo $this->Form->submit('Create new client', [ 'name' => 'submit','class'=>'btn btn-primary btn-success',"onClick"=>"validateForm()"])?>



    </fieldset>


    <?= $this->Form->end() ?>


              </div>
    </div>
  </div>
   
  </div>
</div>
   
</div>

 </div>

<script>
$(document).ready(function() {
  
   $('#example').DataTable();
     $('#example2').DataTable();
   
    
    
} );
</script>




    
   

