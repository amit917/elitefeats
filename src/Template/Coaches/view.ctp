<section class="content-header">
  <h1>
    Coach
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
            <dd><?= h($coach->First name) ?></dd>
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($coach->Last name) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($coach->Email) ?></dd>
            <dt scope="row"><?= __('Coach Id') ?></dt>
            <dd><?= $this->Number->format($coach->coach_id) ?></dd>
            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= $this->Number->format($coach->phone) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
