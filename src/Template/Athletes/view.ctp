<section class="content-header">
  <h1>
    Athlete
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
            <dd><?= h($athlete->first_name) ?></dd>
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($athlete->last_name) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($athlete->email) ?></dd>
            <dt scope="row"><?= __('Sport') ?></dt>
            <dd><?= $athlete->has('sport') ? $this->Html->link($athlete->sport->Sports_id, ['controller' => 'Sports', 'action' => 'view', $athlete->sport->Sports_id]) : '' ?></dd>
            <dt scope="row"><?= __('Module') ?></dt>
            <dd><?= $athlete->has('module') ? $this->Html->link($athlete->module->module_id, ['controller' => 'Modules', 'action' => 'view', $athlete->module->module_id]) : '' ?></dd>
            <dt scope="row"><?= __('Assessment') ?></dt>
            <dd><?= $athlete->has('assessment') ? $this->Html->link($athlete->assessment->id, ['controller' => 'Assessment', 'action' => 'view', $athlete->assessment->id]) : '' ?></dd>
            <dt scope="row"><?= __('Athlete Id') ?></dt>
            <dd><?= $this->Number->format($athlete->athlete_id) ?></dd>
            <dt scope="row"><?= __('Age') ?></dt>
            <dd><?= $this->Number->format($athlete->age) ?></dd>
            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= $this->Number->format($athlete->phone) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
