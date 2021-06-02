<?php
namespace App\Controller;

use App\Controller\AppController;
use DateTime;
use DatePeriod;
use DateInterval;
use Cake\ORM\Query;
use Cake\Database\Expression\QueryExpression;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {    
        $this->viewBuilder()->setLayout('default');
        $clients = $this->paginate($this->Clients);
         $this->loadmodel("completed_assessments");
         $clients = $this->paginate($this->Clients);
          $this->set(compact('clients'));
         $this->set("client_ids",$clients);
       
        if($this->request->is('post')){
             $data = $this->request->getData();
             $time = $data["Time"];
             $start_date =  substr($time,0,10);
             $end_date = substr($time,12,20);
             $new_start_date = date("Y-m-d", strtotime($start_date)); 
             $new_end_date = date("Y-m-d", strtotime($end_date)); 
             //Function to get range.
             function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
            
                    // of period 1 day 
                      $interval = new DateInterval('P1D'); 
  
                     $realEnd = new DateTime($end); 
                     $realEnd->add($interval); 
  
                     $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
  
                      // Use loop to store date into array 
                      foreach($period as $date) {                  
                              $array[] = $date->format($format);  
                         } 
  
                     // Return the array elements 
                     return $array; 
                    } 
  
            // Function call with passing the start date and end date to get date range.
                 $Date = getDatesFromRange( $new_start_date,  $new_end_date);
                 $clients = [];
                 foreach($Date as $Dates){
                    $selected_date = strval($Dates);
               //Query to find assessnents based on Name, Assessment, Date completed.
               if($data["name"]!= null && $data["assessment"]!= 0){
                    $query = $this->completed_assessments->find("all",["contain"=>['clients','assessment']])->where(['OR'=> [['First_name'=>$data["name"]],['Last_name'=>$data["name"]]],
                        'AND'=>['selected' => $selected_date],['completed_assessments.assessment_id'=>$data["assessment"]]]);
                    // Converting query to array
                    $arrays = $query->toArray();
                    foreach($arrays as $array){
                        array_push($clients,$array['Clients']);
                    }
                 }
                 //Query to find assessnents based on Assessment, Date completed,Name
                  if($data["name"]!= null && $data["assessment"] == 0){

                        $query = $this->completed_assessments->find(all,["contain"=>'clients'])->where(['OR'=>[['First_name'=>$data["name"]],['Last_name'=>$data["name"]]],'AND'=>['selected' => $selected_date]]);
                         $arrays = $query->toArray();
                    foreach($arrays as $array){
                        array_push($clients,$array['Clients']);
                    }
                  }
                  //Query to find assessnents based on Assessment, Date completed
                   if($data["name"]== null && $data["assessment"] == 0){

                        $query = $this->completed_assessments->find("all",["contain"=>'clients'])->where([[['AND'=>['selected' => $selected_date]]]]);
                         $arrays = $query->toArray();
                    foreach($arrays as $array){
                        array_push($clients,$array['Clients']);
                    }
                  }
                 
                 }
                 
                 
         function unique_multidimensional_array($array, $key) {
                 $temp_array = array();
                 $i = 0;
                 $key_array = array();

                 foreach($array as $val) {
                     if (!in_array($val[$key], $key_array)) {
                          $key_array[$i] = $val[$key];
                         $temp_array[$i] = $val;
                     }
                     $i++;
                 }
                return $temp_array;
            }
            
            $unique_clients = unique_multidimensional_array($clients, $key = "id");
            $this->set("client_ids",$unique_clients );
            
          
            
        }

           
        
        $this->set(compact('clients'));
        $assessment = $this->loadmodel("assessment");
        $assessment_query = $this->assessment->find("all");
         $assessment_arrays = $assessment_query->toArray();
        
         $assessments = ["0"=>"All"];
         foreach($assessment_arrays as $assessment_array){
           $id = $assessment_array['assessment_id'];
          $assessments[$id] =  $assessment_array['assessment_name'];
         }
        
         $this->set("assessment",$assessments);
         $session = $this->getRequest()->getSession();
         $session->write('Switch', 'off');
    }
    
     public function addClientsGroup()
    {
        //Load Assessments
         $assessment = $this->loadmodel("assessment");
        
         $this->loadmodel("pending_assessment");
          $this->loadmodel("completed_assessments");
         $assessment_query = $this->assessment->find("all");
         $pending  = $this->pending_assessment->find("all");
         
         $assessment_arrays = $assessment_query->toArray();
        
         $assessments = ["0"=>"All"];
         foreach($assessment_arrays as $assessment_array){
              $id = $assessment_array['assessment_id'];
                $assessments[$id] =  $assessment_array['assessment_name'];
         }
        
         $this->set("assessment",$assessments);
         //Load clients
         $clients = $this->paginate($this->Clients);
          $this->set(compact('clients'));
         $this->set("client_ids",$clients);
         $this->set("pending","");
         
          if($this->request->is('post')){
              $data = $this->request->getData();
               $time = $data["Time"];
             $start_date =  substr($time,0,10);
             $end_date = substr($time,12,20);
             $new_start_date = date("Y-m-d", strtotime($start_date)); 
             $new_end_date = date("Y-m-d", strtotime($end_date)); 
             //Function to get range.
             function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
            
                    // of period 1 day 
                      $interval = new DateInterval('P1D'); 
  
                     $realEnd = new DateTime($end); 
                     $realEnd->add($interval); 
  
                     $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
  
                      // Use loop to store date into array 
                      foreach($period as $date) {                  
                              $array[] = $date->format($format);  
                         } 
  
                     // Return the array elements 
                     return $array; 
                    } 
  
            // Function call with passing the start date and end date to get date range.
                 $Date = getDatesFromRange( $new_start_date,  $new_end_date);
                 // Array to hold list of clients who have completed their assessments.
                  $completed_clients = [];
                  // Array to hold list of clients who have not completed their assessments.
                  $pending_clients = [];
                 foreach($Date as $Dates){
                    $selected_date = strval($Dates);
               //Query to find assessnents based on Name, Assessment, Date completed.
               if( $data["assessment"]!= 0){
                    $query = $this->completed_assessments->find("all",["contain"=>['clients','assessment']])->where([
                        'AND'=>['selected' => $selected_date],['completed_assessments.assessment_id'=>$data["assessment"]]]);
                         $arrays = $query->toArray();
                        
                         foreach($arrays as $array){
                        array_push($completed_clients,$array);
                    }
                    
                    // Converting query to array
                   
                    $query1 = $this->pending_assessment->find("all",["contain"=>['clients','assessment']])->where([
                        'AND'=>['selected' => $selected_date],['pending_assessment.assessment_id'=>$data["assessment"]]]);
                    // Converting query to array
                    $pending_array = $query1->toArray();
                     foreach($pending_array as $arrays){
                     array_push($pending_clients,$arrays);
                     }

                    
                
                    
                 }
                 if($data["assessment"]== 0){
                      $query = $this->completed_assessments->find("all",["contain"=>['clients','assessment']])->where([
                           'selected' => $selected_date]);
                         $arrays = $query->toArray();
                        
                         foreach($arrays as $array){
                        array_push($completed_clients,$array);
                    }
                    
                    // Converting query to array
                   
                    $query1 = $this->pending_assessment->find("all",["contain"=>['clients','assessment']])->where([
                        'AND'=>['selected' => $selected_date]]);
                    // Converting query to array
                    $pending_array = $query1->toArray();
                     foreach($pending_array as $arrays){
                     array_push($pending_clients,$arrays);
                     }
                 }
                 
          }
          $this->set("client_ids", $completed_clients);
          $this->set("pending", $pending_clients);
    }

}
    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('clients');
        $this->loadModel('purchased_assessments');
        $this->loadModel('pending_assessment');
        $this->loadModel('assessment');
        $clients = $this->clients->get($id);
        $session = $this->getRequest()->getSession();
        $session->write('client_id',$id);
        $user_id = $session->read('Auth.User.id');
        $query= $this->purchased_assessments->find('all')->where(['user_id'=>$user_id])->contain(['assessment']);
        $purchased = $query->toArray();
        $query1= $this->pending_assessment->find('all')->where(['client_id'=>$id])->contain(['assessment']);
        $pending = $query1->toArray();

        $this->set('pending_assessment',$pending);


        $this->set('clients', $clients);
        $this->set('purchasedAssessments', $purchased);
        if ($this->request->is('post') && $this->request->getData('submit') === 'Assign assessment') {
            $data = $this->request->getData();


            foreach ($purchased as $purchase){
                    $id = $purchase['assessment_id'];


                    if($data[$id]!= 0){
                        $pending_assessment = $this->pending_assessment->newEntity();
                        $pending_assessment->assessment_id = $data[$id];
                        $session = $this->getRequest()->getSession();
                        $client_id = $session->read('client_id');
                        $pending_assessment->client_id = $client_id;
                        $this->pending_assessment->save($pending_assessment);
                        $purchased_assessments = $this->purchased_assessments->query();
                        $user_id = $session->read('Auth.User.id');
                        $query= $this->purchased_assessments->find('all')->where(['user_id'=>$user_id])->contain(['assessment']);
                        $purchased = $query->toArray();
                        foreach($purchased as $value){
                            if($value['quantity'] != 0){
                                $quantity = $value['quantity']-1;
                               // debug($quantity);
                              //  debug($data[$id]);
                                $result = $purchased_assessments->update()
                                    ->set(['quantity' => $quantity])
                                    ->where(['assessment_id' => $data[$id]])
                                    ->execute();

                                $saved_query= $this->purchased_assessments->find('all')->where(['user_id'=>$user_id])->contain(['assessment']);
                                $saved_purchased = $saved_query->toArray();
                              //  debug($saved_purchased);
                                $query1 = $this->purchased_assessments->query();
                                foreach($saved_purchased as $save_purchase){
                                    if($save_purchase['quantity'] == 0){
                                        $query1->delete()
                                            ->where(['assessment_id' => $data[$id]])
                                            ->execute();
                                    }
                                }
                            }

                        }



                    }
            }







        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  public function add()
    {
        $this->loadModel('groups');
        $this->loadModel('clients');
        $this->loadModel('memberships');
        
        $client = $this->Clients->newEntity();
         $query2 = $this->groups->find('all');
         $client_data1 = $query2->toArray();
         $this->set('groups',$client_data1);
        
       $membership = $this->memberships->newEntity();
        if($this->request->is('post')&& $this->request->getData('submit') === 'Add client to group'){
            $data = $this->request->getData();
             $query = $this->clients->find()->where(['Email'=>$data['Email']]);
             $data2 = $query->toArray();
             $query1 = $this->groups->find();
             $data3 = $query->toArray();
             $data4 = $query1->toArray();
              $selected_entry = 0;
              $group_name1 = "";
             foreach($data2 as $result){
                 foreach($data4 as $result2){
                     $membership = $this->memberships->newEntity();
                    
                     if( $data[$result2['group_id']] != 0){
                          $selected_entry = $selected_entry+1;
                          $membership->client_id = $result['id'];
                          $membership->group_id = $result2['group_id'];
                          $query1 = $this->groups->find()->where(['group_id'=>$result2['group_id']]);
                         $group_names = $query1->toArray();
                         foreach( $group_names as $group_name){
                              $group_name1 = $group_name1 .' '.$group_name['group_name'];
                         }
                         
                          $this->memberships->save($membership);
                     
                 }
                 
               
                
             }
                  
               
            }
               if($selected_entry >= 1){
                $this->Flash->success(__('The client has been added to your group or groups'.$group_name1));
                 return $this->redirect(['action' => 'add']);
               }
               if($selected_entry == 0){
                    $this->Flash->error(__('Please select a client from the list ' ));
               }
               
        }
        if ($this->request->is('post')&& $this->request->getData('submit') === 'Create new client') {
            $data = $this->request->getData();
          
           
            $query1 = $this->clients->find()->where(['Email'=>$data['Email']]);
            $data1 = $query1->toArray();
            if ($data1 != null){
                 $this->Flash->error(__('The client couldnot be created as it already exists. ' ));
            }
            if($data1 == null){
             $new_client = $this->Clients->newEntity();
             $new_client->First_name = $data['First_name'];
             $new_client->Last_name = $data['Last_name'];
             $new_client->Email = $data['Email'];
             $this->Clients->save($new_client);
            
                $this->Flash->success(__('The client '.'  ' .$data['First_name'].' '.$data['Last_name'].' '.'has been saved. Please add client to the group'));
            
        }
        

        $this->set(compact('client'));
        $value = $this->request->getQuery("id");
        $this->set("value",$value);
    }
    }
   
    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function report(){
        
    }
}
