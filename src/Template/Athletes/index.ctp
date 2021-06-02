<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Athletes

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('athlete_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('sports_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('module_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('asses_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($athletes as $athlete): ?>
                <tr>
                  <td><?= $this->Number->format($athlete->athlete_id) ?></td>
                  <td><?= h($athlete->first_name) ?></td>
                  <td><?= h($athlete->last_name) ?></td>
                  <td><?= $this->Number->format($athlete->age) ?></td>
                  <td><?= $this->Number->format($athlete->phone) ?></td>
                  <td><?= h($athlete->email) ?></td>
                  <td><?= $athlete->has('sport') ? $this->Html->link($athlete->sport->Sports_id, ['controller' => 'Sports', 'action' => 'view', $athlete->sport->Sports_id]) : '' ?></td>
                  <td><?= $athlete->has('module') ? $this->Html->link($athlete->module->module_id, ['controller' => 'Modules', 'action' => 'view', $athlete->module->module_id]) : '' ?></td>
                  <td><?= $athlete->has('assessment') ? $this->Html->link($athlete->assessment->id, ['controller' => 'Assessment', 'action' => 'view', $athlete->assessment->id]) : '' ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $athlete->athlete_id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $athlete->athlete_id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $athlete->athlete_id], ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->athlete_id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>