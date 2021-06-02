<section class="content-header">
  <h1>
    Gurdian
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('First Name') ?></dt>
            <dd><?= h($gurdian->First Name) ?></dd>
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($gurdian->Last Name) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($gurdian->email) ?></dd>
            <dt scope="row"><?= __('Parent Id') ?></dt>
            <dd><?= $this->Number->format($gurdian->parent_id) ?></dd>
            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= $this->Number->format($gurdian->phone) ?></dd>
            <dt scope="row"><?= __('Child Id') ?></dt>
            <dd><?= $this->Number->format($gurdian->child_id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Children') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($gurdian->children)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Age') ?></th>
                    <th scope="col"><?= __('Module Id') ?></th>
                    <th scope="col"><?= __('Gurdian Id') ?></th>
                    <th scope="col"><?= __('Asses Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($gurdian->children as $children): ?>
              <tr>
                    <td><?= h($children->id) ?></td>
                    <td><?= h($children->first_name) ?></td>
                    <td><?= h($children->last_name) ?></td>
                    <td><?= h($children->Age) ?></td>
                    <td><?= h($children->module_id) ?></td>
                    <td><?= h($children->gurdian_id) ?></td>
                    <td><?= h($children->asses_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Children', 'action' => 'view', $children->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Children', 'action' => 'edit', $children->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Children', 'action' => 'delete', $children->id], ['confirm' => __('Are you sure you want to delete # {0}?', $children->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Gurdians') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($gurdian->child_gurdians)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Parent Id') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Child Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($gurdian->child_gurdians as $childGurdians): ?>
              <tr>
                    <td><?= h($childGurdians->parent_id) ?></td>
                    <td><?= h($childGurdians->First Name) ?></td>
                    <td><?= h($childGurdians->Last Name) ?></td>
                    <td><?= h($childGurdians->phone) ?></td>
                    <td><?= h($childGurdians->email) ?></td>
                    <td><?= h($childGurdians->child_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Gurdians', 'action' => 'view', $childGurdians->parent_id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Gurdians', 'action' => 'edit', $childGurdians->parent_id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Gurdians', 'action' => 'delete', $childGurdians->parent_id], ['confirm' => __('Are you sure you want to delete # {0}?', $childGurdians->parent_id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
