<legend><?= __('Add Members') ?></legend>
<?php echo $this->Form->create( "", ['url' => ['action' => 'add']]);?>

    <div class = "container">
        <?php if($no_users != null){?>
        <?php for ($x = 0; $x <= $no_users-1; $x++) {?>
        <div class = "row">
            <div class = "col-sm-4">
                <div class = "form-group">
                    <div class="autocomplete" style="width:300px;">
                        <?php $familyname = "familyname".$x;?>
                        <?php echo $this->Form->control("Family_name",['class'=>'form-control',"name"=>$familyname,'id'=>$familyname])?>
                    </div>
                </div>

            </div>
            <div class = "col-sm-4">
                <div class = "form-group">
                    <div class="autocomplete" style="width:300px;">
                        <?php $givenName = "givenName".$x;?>
                        <?php echo $this->Form->control("Given_name",['class'=>'form-control',"name"=>$givenName,'id'=>$givenName])?>
                    </div>
                </div>
            </div>
            <div class = "col-sm-4">
                <div class = "form-group">
                    <div class="autocomplete" style="width:300px;">
                        <?php $email = 'email'.$x;?>
                        <?php echo $this->Form->control("Email",['class'=>'form-control',"name"=>$email,'id'=>$email])?>
                    </div>
                </div>
            </div>
            <?php echo $this->Form->control("Group_name",['class'=>'form-control',"value"=>$group_name,'id'=>$group_name,'type'=>'hidden'])?>
            <?php echo $this->Form->control("Group_description",['class'=>'form-control',"value"=> $group_des ,'id'=>$group_des,'type'=>'hidden'])?>
            <?php echo $this->Form->control("no_members",['class'=>'form-control',"value"=>  $no_users ,'id'=>$no_users,'type'=>'hidden'])?>
        </div>
        <?php }?>

    </div>
   <?php echo $this->Form->end();?>
   <?php }?>

