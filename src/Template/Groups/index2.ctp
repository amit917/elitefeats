<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="groups index large-9 medium-8 columns content">
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        
       <!-- <div class="col-lg-3 col-6">-->
            <!-- small card -->
            <!--<div class="small-box bg-info">
                <div class="inner">
                    <h3>Access groups</h3>

                    <p>View all groups</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Groups",
                    "action" => "index"]); ?>" class="small-box-footer">Access groups<i class="small-box-footer"></i></a>
            </div>
        </div>-->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h2><b>New <br>groups</b></h2>

                    <p></p>
                </div>
                <div class="icon">
                    <i class="fa fa-plus-square" style="color:white; font-size:45px"></i>
                </div>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Groups",
                    "action" => "add"]); ?>" class="small-box-footer"><b>Create </b><i class="glyphicon glyphicon-arrow-right"></i><i class="small-box-footer"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-sm-3">
            <!-- small card -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h2><b>New <br>clients</b></h2>

                    <p></p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus" style="color:white; font-size:45px"></i>
                </div>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Clients",
                    "action" => "add"]); ?>" class="small-box-footer"><b>Add clients </b><i class="small-box-footer"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>


  <div class = "box  box-solid box-primary">
      <div class="box-header bg-yellow">
          <div class = 'col-sm-8'>
              <h5 class="box-title"><b>My groups</b></h5>
          </div>


      </div>
      <div class = "row">
          <div class = 'col-sm-4 pull-left' style="padding:25px;">
              <?php echo $this->Form->control("search");?>
          </div>
      </div>
      <div class = "table-content">

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col"><?= $this->Paginator->sort('group_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('group_description') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date of creation') ?></th>


            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($groups as $group): ?>
            <tr>
               <?php $var = $group->group_id;?>
                <td class="actions">
                    <?= $this->Html->link(__( $group->group_name), ['controller'=>'Memberships','action' => 'index','id'=>$var]) ?>
                </td>
                <td>
                    <?= $this->Html->link(__( $group->group_des), ['controller'=>'Memberships','action' => 'index','id'=>$var]) ?>
                </td>
                 <td><?= h($group->created_date) ?></td>
               <td>
                   <?= $this->Form->postLink(__( 'View'), ['controller'=>'Memberships','action' => 'index','id'=>$var], ['class' => 'btn btn-success']) ?>
                   <?= $this->Html->link(__('Edit'), ['controller' => 'groups', 'action' => 'edit',$var],['class' => 'btn btn-warning']) ?>
                   <?= $this->Form->postLink(__( ' Delete'), ['action' => 'delete', $group->group_id], ['class' => 'btn btn-danger ','confirm' => __('Are you sure you want to delete # {0}?', $group->group_name)]) ?>
               </td>


            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
   <script>
        $('document').ready(function(){
            $('#search').keyup(function(){
                var searchkey = $(this).val();
                searchTags( searchkey );
            });

            function searchTags( keyword ){
                var data = keyword;
                $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'groups', 'action' => 'SearchTable' ] ); ?>",
                    data: {keyword:data},

                    success: function( response )
                    {
                        $( '.table-content' ).html(response);
                    }
                });
            };
        });
    </script>
</section>


</div>

