<table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('First name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last name') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Email') ?></th>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($data as $membership): ?>
                <tr>
                    <td>
                        <?= $this->Html->link(__($membership['Clients']['First_name'] ), ['controller'=>'clients','action' => 'view',$membership['Clients']['id']]) ?>
                    </td>
                    <td>
                        <?= $this->Html->link(__($membership['Clients']['Last_name'] ), ['controller'=>'clients','action' => 'view',$membership['Clients']['id']]) ?>
                    </td>
                    <td> <?= $this->Html->link(__($membership['Clients']['Email'] ), ['controller'=>'clients','action' => 'view',$membership['Clients']['id']]) ?></td
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
