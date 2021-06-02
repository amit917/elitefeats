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
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Access groups</h3>

                    <p>View all groups</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Groups",
                    "action" => "index2"]); ?>" class="small-box-footer">Access groups<i class="small-box-footer"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Create groups<sup style="font-size: 20px"></sup></h3>

                    <p> Create new groups</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Groups",
                    "action" => "add"]); ?>" class="small-box-footer">Create new groups<i class="small-box-footer"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Add clients</h3>

                    <p>Add new clients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="<?php echo $this->Url->build([
                    "controller" => "Clients",
                    "action" => "add"]); ?>" class="small-box-footer">Add clients<i class="small-box-footer"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>
    <div class = "row">
        <div class = 'col-sm-4 pull-left'>
            <?php echo $this->Form->control("search",["placeholder"=>"Search by group name or group description"]);?>
        </div>
    </div>



      <div class = "table-content">

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

