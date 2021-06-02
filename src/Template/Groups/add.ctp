<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="groups form large-9 medium-8 columns content">
      <div class="box box-warning ">
            <div class="box-header with-border  bg-warning">
              <h3 class="box-title">Create group</h3>
            </div>
            <div class="box-body">
             <div class = "form-content">
    <?= $this->Form->create('',["id"=>"myForm"]) ?>

        <?php echo $this->Form->create();?>
       <div class = "row">
        <div class = "col-sm-4">
            <div class = "form-group">
                <?php echo $this->Form->control("Group_name",['class'=>'form-control','required' =>true])?>
            </div>

        </div>

        <div class = "col-sm-5">

            <div class = "form-group">
                <?php echo $this->Form->control("Group_description",['class'=>'form-control','id'=>'group-description'])?>
            </div>
        </div>

    </div>
    </div>
    <div class = "row">
         <div class = "col-sm-3">
         <div class = "form-group">
                <?php echo $this->Form->control("no_of_members",['class'=>'form-control','type'=>'number'])?>
            </div>
            </div>

    </div>


</div>
            </div>
            <!-- /.box-body -->
          </div>


<div class = "content">


    <div class = "table-content">

        <script>
            $('document').ready(function(){
                $('#no-of-members').keyup(function(){
                    var searchkey = $(this).val();
                    var searchkey1 = [];
                    searchkey1[0] = searchkey;
                    var group_name =   $('#group-name').val();
                    var group_des =  $('#group-description').val();
                    var no_members =  $('#no-of-members').val();
                    document.getElementById("myForm").submit();



                   // searchTags( searchkey1 );
                });

                function searchTags( keyword ){
                    var data = keyword;


                    $.ajax({
                        method: 'get',
                        url : "<?php echo $this->Url->build( [ 'controller' => 'Groups', 'action' => 'add' ] ); ?>",
                        data: {keyword:data},

                        success: function( response )
                       {
                           $( '.table-content' ).html(response);
                        }
                    });
                };
            });
        </script>



    </div>

<?php if($no_users != null){?>
 <?php $session = $this->request->getSession(); ?>
 <?php  if (!$session->check('previous')) { ?>
 <?php $session->write('previous',1);?>
 <?php }?>
<?php  if ($session->check('previous')) { ?>
   <?php $previous = $session->read('previous');?>
    <?php $session->write('new',$previous);?>
   <?php $session->write('previous',$no_users);?>
<?php } ?>
  <div class="box box-success ">
            <div class="box-header with-border  bg-warning">
              <h3 class="box-title ">Add members</h3>
            </div>
            <div  class="box-body">
                <?php $switch = false; ?>
                <?php if($switch == false ) { ?>
             <?php for ($x = 0; $x <= $no_users-1; $x++) {?>


        <div  class = "row">
            <div class = "col-sm-4">
                <div class = "form-group">
                        <?php $familyname = "familyname".$x;?>
                        <?php echo $this->Form->control("Family_name",['class'=>'form-control',"name"=>$familyname,"required"=>true,'id'=>$familyname])?>
                    </div>

            </div>
            <div class = "col-sm-4">
                <div class = "form-group">
                        <?php $givenName = "givenName".$x;?>
                        <?php echo $this->Form->control("Given_name",['class'=>'form-control',"name"=>$givenName,"required"=>true,'id'=>$givenName])?>
                </div>
            </div>
            <div class = "col-sm-4">
                <div class = "form-group">
                        <?php $email = 'email'.$x;?>
                        <?php echo $this->Form->control("Email",['class'=>'form-control',"name"=>$email,"required"=>true,'id'=>$email])?>
                </div>
            </div>
        </div>
  <?php }?>
    <?php }?>



<?php }?>
<?php $session = $this->request->getSession(); ?>
<?php if(isset($cars)) { ?>
<?php if (sizeof($cars)!= 0){ ?>
<?php $session->write('old_cars',$cars);?>
<?php }?>
<?php if (sizeof($cars) == 0){ ?>
<?php $cars = $session->read('old_cars');?>

<?php }?>
<?php }?>
<?php if(isset($bus)) { ?>
<?php if (sizeof($bus)!= 0){ ?>
<?php $session->write('old_bus',$bus);?>
<?php }?>
<?php if (sizeof($bus) == 0){ ?>
<?php $bus = $session->read('old_bus');?>

<?php }?>
<?php }?>
<?php if(isset($train)) { ?>
<?php if (sizeof($train)!= 0){ ?>
<?php $session->write('old_train',$train);?>
<?php }?>
<?php if (sizeof($train) == 0){ ?>
<?php $train = $session->read('old_train');?>

<?php }?>
<?php }?>


<script>
 var jsvar = <?php echo json_encode($cars); ?>;
  var meaning = <?php echo json_encode($bus); ?>;
  var meaning2 =  <?php echo json_encode($train); ?>;
 var number = <?php echo json_encode($no_users); ?>;
function myFunction() {
  alert(meaning2);
 }
//document.getElementById("familyname0")= "Hello";
if(jsvar.length > 0){
    for (i = 0; i < number; i++) {
         str2 = "familyname".concat(i);
         str3 = "givenName".concat(i);
         str4 = "email".concat(i);
         if (typeof(jsvar[i]) != "undefined"){
         document.getElementById(str2).value = jsvar[i];
         }
         if (typeof(meaning[i]) != "undefined"){
         document.getElementById(str3).value = meaning[i];
         }
         if (typeof(meaning2[i]) != "undefined"){
           document.getElementById(str4).value = meaning2[i];

         }
}



}
</script>



<?php echo $this->Form->submit("Create group", ['name' => 'submit1', 'class'=>'btn btn-warning']) ?>
            </div>
            <!-- /.box-body -->
          </div>


</div>
</div>
</div>
</div>






