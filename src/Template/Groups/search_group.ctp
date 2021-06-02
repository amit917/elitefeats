  <div class = "form-content">

    <?= $this->Form->create() ?>
        <legend><?= __('Create Group') ?></legend>
        <?php echo $this->Form->create();?>
       <div class = "row">
        <div class = "col-sm-4">
            <div class = "form-group">
                <?php echo $this->Form->control("Group_name",['class'=>'form-control','value'=>$group_name, array('readonly' => 'readonly')])?>
            </div>

        </div>

        <div class = "col-sm-5"
            <div class = "form-group">
                <?php echo $this->Form->control("Group_description",['class'=>'form-control','value'=>$group_des,'id'=>'group-description' ,array('readonly' => 'readonly')])?>
            </div>
        </div>

    </div>
    </div>
