<?php
namespace App\Controller;

use App\Controller\AppController;
use DateInterval;
use DatePeriod;
use DateTime;

/**
 * Assessment Controller
 *
 * @property \App\Model\Table\AssessmentTable $Assessment
 *
 * @method \App\Model\Entity\Assessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssessmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $assessment = $this->paginate($this->Assessment);
        $this->loadModel('Assessment');
        $this->loadModel('completed_assessments');
        $this->loadModel("reports");
        $this->viewBuilder()->setLayout('default5');
        $query = $this->Assessment->find('all');
        $assessment_arrays = $query->toArray();
        $assessment = ["0"=>"All"];
         foreach($assessment_arrays as $assessment_array){
              $id = $assessment_array['assessment_id'];
                $assessment[$id] =  $assessment_array['assessment_name'];
         }

         foreach ($assessment as $key => $value) {
              $assessment[$value] = $value;
         }
        $accounts = $assessment;
         if ($this->request->is('post')) {
             $data = $this->request->getData();
             function getDatesFromRange($start, $end, $format = 'Y-m-d')
             {

                 // Declare an empty array
                 $array = array();

                 // Variable that store the date interval
                 // of period 1 day
                 $interval = new DateInterval('P1D');

                 $realEnd = new DateTime($end);
                 $realEnd->add($interval);

                 $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

                 // Use loop to store date into array
                 foreach ($period as $date) {
                     $array[] = $date->format($format);
                 }

                 // Return the array elements
                 return $array;
             }

             // All dates
             if($data['time']== 0){
                 $selected_start = '2000-01-01';
                 $selected_end = '2050-09-02';
                 $Date = getDatesFromRange($selected_start, $selected_end);
              //   debug($Date);
                 foreach($Date as $dates){
                   //  debug($dates);
                     $reports_generated = $this->reports->find("all",['contain'=>['Assessment']])->where([ ['selected' => $dates]]);
                     $reports_generated = $reports_generated->toArray();
                     if(!empty($reports_generated)){
                         debug($reports_generated);
                     }

                 }

               //  debug($reports_generated);
             }
             // Today
             if($data['time']== 1){

             }
             // Last seven days
             if($data['time']== 2){

             }
             // This Month to date
             if($data['time']== 3){

             }
             //This Year to date

             if($data['time']== 4){

             }


           }
        $this->set('assessment',$accounts);
    }

    /**
     * View method
     *
     * @param string|null $id Assessment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assessment = $this->Assessment->get($id, [
            'contain' => [],
        ]);

        $this->set('assessment', $assessment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assessment = $this->Assessment->newEntity();
        $this->viewBuilder()->setLayout('default3');
         $this->loadModel('client_details');
        if ($this->request->is('post')) {
           // $assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
             $data = $this->request->getData();
             debug($data);
           $exists = $this->client_details->exists(['Email' => $data['Email']]);
           if($exists){
               $this->Flash->error(__('A client with the same email address exist in the system. Please try again.'));
           }
           if(!$exists){
               $First_name = $data['First_name'];
               $Last_name = $data['Last_name'];
               $Email = $data['Email'];
               $Phone = $data['Phone'];
               $Organization = $data['Organization'];
               $Role = $data['Role'];
               $Address_1 = $data['Address_1'];
               $Address_2 = $data['Address_2'];
               $City = $data['City'];
               $State = $data['State'];
               $Country = $data['Country'];
               $client = $this->client_details->newEntity();
               $client->First_name = $First_name;
               $client->Last_name = $Last_name;
               $client->Email = $Email;
               $client->Phone = $Phone;
               $client->Organization =  $Organization;
               $client->Role = $Role;
               $client->Address_1 = $Address_1;
               $client->Address_2 = $Address_2;
               $client->City = $City;
               if( $this->client_details->save($client)){
                    $this->Flash->success(__('The client has been saved.'));

               }


           }

           // if ($this->Assessment->save($assessment)) {
            //    $this->Flash->success(__('The assessment has been saved.'));

           //     return $this->redirect(['action' => 'index']);
           // }
           // $this->Flash->error(__('The assessment could not be saved. Please, try again.'));
        }
        $this->set(compact('assessment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assessment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assessment = $this->Assessment->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assessment = $this->Assessment->patchEntity($assessment, $this->request->getData());
            if ($this->Assessment->save($assessment)) {
                $this->Flash->success(__('The assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assessment could not be saved. Please, try again.'));
        }
        $this->set(compact('assessment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assessment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assessment = $this->Assessment->get($id);
        if ($this->Assessment->delete($assessment)) {
            $this->Flash->success(__('The assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
