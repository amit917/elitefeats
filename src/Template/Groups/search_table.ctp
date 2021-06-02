
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
