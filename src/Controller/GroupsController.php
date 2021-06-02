<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
    }
    public function index2()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => [],
        ]);

        $this->set('group', $group);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        $this->loadModel('clients');
        $this->loadModel('groups');
        $this->loadModel('memberships');


        //  $this->set('users',$members);

        $no_users = $this->request->getquery('members');
        $this->set("no_users", $no_users);

        $query = $this->clients->find()->select(['email', 'first_name', 'last_name']);


        $email = $query->toArray();

        $emails = array();
        $first_name = array();
        $last_name = array();
        foreach ($email as $data1) {
            $value = $data1['email'];
            array_push($emails, $value);
            $first_name[$value] = $data1['first_name'];
            $last_name[$value] = $data1['last_name'];

        }


        $this->set("emails", $emails);
        $this->set("first_name", $first_name);
        $this->set("last_name", $last_name);

        if ($this->request->is('post')) {
            $data = $this->request->getData();
           // debug($data);
            $session = $this->request->getSession();
             $cars = array();
             $bus = array();
             $train = array();
         if ($session->check('new')) { 
             $number = $session->read('new');
             
             for ($x = 0; $x <= $number; $x++) {
              $familyname = "familyname".$x;
              $givenName = "givenName".$x;
              $email = "email".$x;
              if(isset($data[$familyname])){
                   array_push($cars,$data[$familyname]);
              }
               if(isset($data[$givenName])){
                  array_push($bus,$data[$givenName]);
              }
               if(isset($data[$email])){
                  array_push($train,$data[$email]);
              }
              // array_push($cars,$familyname);
              
              
         }
         }
         
         $this->set('cars',$cars);
         $this->set('bus',$bus);
          $this->set('train',$train);
          $session = $this->request->getSession();
           $session->write("old_data",$cars);
            $session->write("old_data_bus",$bus);
          //  debug($data);
            $no = $data['no_of_members'];
            
        
         
           $firstname = array();
           
            
           
            $this->set("no_users",$data['no_of_members']);
            $session = $this->getRequest()->getSession();
            $session->write('no_users',$data['no_of_members']);
            $this->set("name",$data['Group_name']);
            $this->set("des",$data['Group_description']);

        }
        if ($this->request->is('post') && $this->request->getData('submit1') === 'Create group') {
            $data = $this->request->getData();
            $group_name = $data['Group_name'];
            $group_description = $data['Group_description'];
            $query = $this->groups->find("all")->where(["group_name"=>$group_name]);
            $data2 = $query->toArray();
            if($data2 != null){
                $this->Flash->error(__('A group with the same name already exists.Please enter a different group name'));
            }
            if($data2 == null){
                $group = $this->groups->newEntity();
                $group->group_name = $group_name;
                $group->group_des = $group_description;
                 $group_result = $this->groups->save($group);
                 $group_id = $group_result->group_id;
                
                $session = $this->getRequest()->getSession();
                $number = $session->read('no_users');
                 $session->destroy();
                for ($x = 0; $x <= $number - 1; $x++)
                {
                  
                    $email = $data['email'.$x];
                    $query1 = $this->clients->find("all")->where(["Email"=>$email]);
                    $data3 = $query1->toArray();
                    if($data3 == null){


                    $clients = $this->clients->newEntity();
                    $memberships = $this->memberships->newEntity();
                    $firstname = $data['familyname'.$x];
                    $lastname = $data['givenName'.$x];
                    $clients->First_name = $firstname;
                    $clients->Last_name = $lastname;
                    $clients->Email = $email;
                    $result = $this->clients->save($clients);

                        $client_id = $result->id;
                        $memberships->group_id = $group_id;
                        $memberships->client_id = $client_id;
                        $this->memberships->save($memberships);

                    }
                    if($data3 != null){
                        foreach ($data3 as $value3){
                            $memberships = $this->memberships->newEntity();
                            $memberships->group_id = $group_id;
                            $memberships->client_id = $value3['id'];
                            $this->memberships->save($memberships);
                        }
                    }


                }
               $this->Flash->success(__('The group has been created.'));
            return $this->redirect(['controller'=>'memberships','action' => 'index','id'=>$group_id]);
            }
            
        }

}



    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('memberships');
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        $query = $this->memberships->find()->where(['group_id'=>$id]);
        $data1 = $query->toArray();
        foreach ($data1 as $val) {
            $client_id = $val['id'];
            $this->memberships->deleteAll([
                'id'=>$client_id
            ]);

        }

        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {

        $this->request->allowMethod('ajax');

        $no_user = $this->request->getQuery('keyword');

        $no_users = $no_user[0];
        $this->loadModel('clients');
        $this->loadModel('groups');
        $this->loadModel('memberships');
        $session = $this->getRequest()->getSession();
        $name = $session->read('group_name');
        $description = $session->read('group_des');
        $group_name = $name;
        $group_des = $description;


        //debug($no_users = $this->request->query('keyword1'));

        $this->set('no_users', $no_users);
        $this->set('group_name', $group_name);
        $this->set('group_des', $group_des);

       // $this->set('group_des', $no_members);
       // $group_name =  $this->request->query('groupName');
      //  $this->set('group_name', $group_name);
        // $this->set('tags', $this->paginate($query));
        // $this->set('_serialize', ['tags']);

    }
    public function searchgroup()
    {
        $this->loadModel('groups');
        $this->groups->newEntity();
        $this->request->allowMethod('ajax');

         $group_des = $this->request->getQuery('keyword1');

         $group_description = $group_des[0];
         $group_name = $group_des[1];
         $no_members = $group_des[2];

         $session = $this->getRequest()->getSession();
         $session->write('group_des', $group_description);
         $session->write('group_name', $group_name);
         $session->write('no_members', $no_members);
         $this->set('group_name',$group_name);
           $this->set('group_des',$group_description);


    }
     public function searchTable()
    {
          $this->loadModel('groups');
         $this->request->allowMethod('ajax');

        $keyword = $this->request->getQuery('keyword');

        $query =  $this->groups->find('all')
            ->where([
                'OR' => [['group_name LIKE' => '%'.$keyword.'%'], ['group_des LIKE' => '%'.$keyword.'%' ]],
            ]);


        $this->set('groups', $this->paginate($query));


    }

}


