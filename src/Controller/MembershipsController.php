<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *
 */
class MembershipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Clients'],
        ];
        $this->loadModel('groups');
        $this->loadModel('clients');
        $this->loadModel('memberships');
        $session = $this->getRequest()->getSession();
        $id = $this->request->getquery('id');
        $session->write('group_id', $id);
        $this->set('group_members',$id);
          $query = $this->groups->find('all',[
              'conditions' => ['group_id'=>$id],
        ]);
       $data1 = $query->toArray();
     foreach($data1 as $value){
            $group_name =$value['group_name'];
            $session->write('group_name', $group_name);
     }
        $clients_id = $this->memberships->find()->select(['client_id'])->where(['group_id' => $id ]);
        $client_data = $clients_id->toArray();
        $array =  array();
        foreach ($client_data as $data){

        $query = $this->clients->find('all',[
              'conditions' => ['id'=>$data['client_id']],
        ]);
            array_push($array,$query);
        }
        $this->set('array',$array);
        $query2 = $this->clients->find('all');
         $client_data1 = $query2->toArray();
         $this->set('clients',$client_data1);
          $this->viewBuilder()->setLayout('default2');

        if ($this->request->is('post') && $this->request->getData('submit') === 'Create new client') {
            $data = $this->request->getData();
           // debug($data);
            $session = $this->getRequest()->getSession();
            $data = $this->request->getData();
            $query1 = $this->clients->find()->where(['Email'=>$data['Email']]);
            $array1 = $query1->toArray();
            if($array1 != null) {
                $this->Flash->error(__('A client with same email exist in the system. Please use a different email'));
            }
            if($array1 == null) {


                $group_id = $data['id'];
                $session = $this->getRequest()->getSession();
                $session->write('new_number', $group_id);

                $client = $this->clients->newEntity();

                $membership = $this->memberships->newEntity();
                $membership->group_id = $group_id;
                $client->First_name = $data['First_name'];
                $client->Last_name = $data['Last_name'];
                $client->Email = $data['Email'];
                $this->clients->save($client);
                $query = $this->clients->find()->where(['Email' => $data['Email']]);
                $data2 = $query->toArray();
                foreach ($data2 as $val) {
                    $membership->client_id = $val['id'];
                }

                if ($this->memberships->save($membership)) {

                    $this->Flash->success(__('The client has been saved and added to the group.'));


                    return $this->redirect(
                        ['controller' => 'memberships', 'action' => 'index', 'id' => $group_id]
                    );

                } else {
                    $this->Flash->error(__('The client could not be saved. Please, try again.'));
                }
            }

        }
          if ($this->request->is('post') && $this->request->getData('submit') === 'Add members to the group') {
              $membership = $this->memberships->newEntity();
             $session = $this->getRequest()->getSession();
             $group_id = $session->read('group_id');
             $data = $this->request->getdata();
             
              $query1 = $this->clients->find("all");
             $clients = $query1->toArray();
            
             $previous_id = [];
              
             foreach ($data as $datas ){
            
                 
                 if($datas != 0){
                      $client_query = $this->memberships->find("all")->where(['group_id'=> $group_id,'client_id'=>$datas]);
                      $client_array = $client_query->toArray();
                    
                      if($client_array == null){
                     $membership = $this->memberships->newEntity();
                     $membership->group_id = $group_id;
                     $membership->client_id = $datas;
                     $this->memberships->save($membership);
                      }
                      
                       if($client_array != null){
                           
                          array_push($previous_id,$datas);
                       }
                 }
                  
                  
                 
             } 
             if($previous_id == null){
              $this->Flash->success(__('The client has been saved and added to the group.'));
              return $this->redirect(
            ['controller' => 'memberships', 'action' => 'index','id'=>$group_id]);
             }
              if($previous_id != null){
                  $message = "";
                  foreach($previous_id as $previous_ids){
                      $message = $message.$previous_ids;
                  }
                   $this->Flash->error(__('The client '.$message.' '. ' could not be saved because it already belong to the group.Please select a different client'));
              }

;

    }
    }

    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => ['Groups', 'Clients'],
        ]);

        $this->set('membership', $membership);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membership = $this->Memberships->newEntity();
        if ($this->request->is('post')) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }

        $groups = $this->Memberships->Groups->find('list', ['limit' => 200]);
        $clients = $this->Memberships->Clients->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'groups', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $groups = $this->Memberships->Groups->find('list', ['limit' => 200]);
        $clients = $this->Memberships->Clients->find('list', ['limit' => 200]);
        $this->set(compact('membership', 'groups', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function search(){
         $session = $this->getRequest()->getSession();
        $group_id = $session->read('group_id');
        $this->request->allowMethod('ajax');
        $keyword = $this->request->getQuery('keyword');
        $query = $this->Memberships->find('all')->contain(['clients']);
       // $query->where(['First_name LIKE'=>'%'.$keyword.'%', ]);
        $query->where([ ['group_id'=>$group_id],
                'OR' => [['First_name LIKE' => '%'.$keyword.'%'], ['Last_name LIKE' => '%'.$keyword.'%' ], ['Email LIKE' => '%'.$keyword.'%' ]],

            ]);
        $data = $query->toArray();
        $this->set('data',$data);
    }
}
