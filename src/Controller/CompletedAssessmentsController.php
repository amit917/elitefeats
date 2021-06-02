<?php
namespace App\Controller;

use App\Controller\AppController;
use DateInterval;
use DatePeriod;
use DateTime;

/**
 * CompletedAssessments Controller
 *
 * @property \App\Model\Table\CompletedAssessmentsTable $CompletedAssessments
 *
 * @method \App\Model\Entity\CompletedAssessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompletedAssessmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assessment', 'Clients'],
        ];
        $completedAssessments = $this->paginate($this->CompletedAssessments);

        $this->set(compact('completedAssessments'));
    }

    /**
     * View method
     *
     * @param string|null $id Completed Assessment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $completedAssessment = $this->CompletedAssessments->get($id, [
            'contain' => ['Assessment', 'Clients'],
        ]);

        $this->set('completedAssessment', $completedAssessment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $completedAssessment = $this->CompletedAssessments->newEntity();
        $this->loadModel("Assessment");
        $this->loadModel("completed_assessments");
        $this->loadModel("reports");

        $this->viewBuilder()->setLayout('default4');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
         //   debug($data);
            $assessments_data = array();
            $record_data = array();
            $array_nvp = array();
            $summary = false;
            $report_generation = false;
            $selected_start = date("Y-m-d", strtotime($data['custom-start']));
            $selected_end = date("Y-m-d", strtotime($data['custom-end']));
            $show = true;
            $this->set("show",$show);
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

            if ($data['reports'] == 0) {
                $summary = true;
                $report_generation = true;


            }
            if ($summary && $report_generation) {
                $completed_assessment = $this->completed_assessments->find("all", ['contain' => ['Assessment']]);
                $reports_generated = $this->reports->find("all",['contain'=>['Assessment']]);

            }

            if (!($summary && $report_generation)) {
                $reports_generated = $this->reports->find("all", ['contain' => ['Assessment']]);

             //   debug($reports_generated->toArray());
              //  $reports_generated = $reports_generated->toArray();
                $report_generation = true;

            }
            if ($data['custom-start'] == '' && $data['custom-end'] == '') {
               // All times
                if ($data['time'] == 0) {
                    //  if($data['custom-start'] == "" )
                    //   $selected_start = '1945-01-01';
                    //  $selected_end = '2120-07-28';
                    $selected_start = '2000-01-01';
                    $selected_end = '2050-09-02';
                    $Date = getDatesFromRange($selected_start, $selected_end);
                }
                // Today
                if ($data['time'] == 1) {
                    $today = date("Y-m-d");
                    //$first_date_year = '2000-01-01';
                    $selected_start = $today;
                    $selected_end = $today;

                    $Date = getDatesFromRange($selected_start, $selected_end);
                    //  debug($Date);
                }
                // Last seven days
                if ($data['time'] == 2) {
                    //  if($data['custom-start'] == "" )
                    //   $selected_start = '1945-01-01';
                    //  $selected_end = '2120-07-28';
                    $today = date("Y-m-d");
                    $last_seven_days = date('Y-m-d', strtotime('-7 days'));

                    // $selected_start = '2000-01-01';
                   // $selected_end = '2050-09-02';
                    $Date = getDatesFromRange($last_seven_days, $today);
                }
                // Month to date
                if ($data['time'] == 3) {
                    $today = date("Y-m-d");
                    $week_date = date("Y-m-01", strtotime($today));
                    $selected_start = $week_date;
                    $selected_end = $today;
                    $Date = getDatesFromRange($selected_start, $selected_end);
                }
                // Year to date
                if ($data['time'] == 4) {
                    $selected_start = date("Y-m-d", strtotime('first day of january this year'));
                    $selected_end = date("Y-m-d");
                    $Date = getDatesFromRange($selected_start, $selected_end);
                }

            }
            if ($data['custom-start'] != '' || $data['custom-end'] != '') {



                // Custom end date is not defined
                if ($data['custom-end'] == "") {
                    $selected_end = '2050-09-02';
                }
                // Custom start date is not defined
                if ($data['custom-start'] == "") {
                     $selected_start = '2000-01-01';
                }
                // All dates
                if ($data['time'] == 0) {
                    $Date = getDatesFromRange($selected_start, $selected_end);
                    //debug($Date);
                }
                // Today
                if ($data['time'] == 1) {
                    $today = date("Y-m-d");
                    if ($today > $selected_end) {
                        $selected_end = $today;
                        $Date = getDatesFromRange($selected_start, $selected_end);
                    }
                    if ($today < $selected_end) {
                        $Date = getDatesFromRange($selected_start, $selected_end);
                    }
                }
                // Week date
                if ($data['time'] == 2) {
                    $last_seven_days = date('Y-m-d', strtotime('-7 days'));
                    if ($last_seven_days < $selected_start) {
                        $selected_start = $last_seven_days;
                        $Date = getDatesFromRange($selected_start, $selected_end);
                    }
                    if ($last_seven_days > $selected_start) {
                        $Date = getDatesFromRange($selected_start, $selected_end);
                    }

                }
              //Month date
                if ($data['time'] == 3) {
                    $today = date("Y-m-d");
                    $week_date = date("Y-m-01", strtotime($today));
                    if ($week_date < $selected_start) {
                        //   debug($week_date);
                        $selected_start = $week_date;
                        $Date = getDatesFromRange($selected_start, $selected_end);
                    } else {
                        //debug($week_date);
                        $Date = getDatesFromRange($selected_start, $selected_end);

                    }

                }
                if ($data['time'] == 4) {
                    $first_date_year = date('Y-m-d', strtotime('first day of january this year'));
                    $Date = getDatesFromRange($first_date_year, $selected_end);
                    // $Date = getDatesFromRange($first_date_year,$current_date);
                    //  debug($Date);
                }

            }


            if (isset($completed_assessment)) {
                if ($data['assessment'] == 0) {
                    $count = count($Date);
                    for ($x = 0; $x <= $count - 1; $x++) {
                        $date = $Date[$x];
                        // debug($date);
                        $query = $completed_assessment->where(['selected' => $date]);
                        $results = $query->toArray();
                        // debug($results);
                        if (!empty($results)) {
                            $assessment_name = $results[0]['assessment']['assessment_name'];
                        }

                        if (!empty($results)) {
                            if ($assessment_name != null) {

                                if (!in_array($assessment_name, $array_nvp)) {
                                    array_push($array_nvp, $assessment_name);
                                }


                            }

                        }


                    }


                    $this->set('name', $array_nvp);
                    $this->set('total', count($array_nvp));
                    $this->set('assessment_name',$assessment_name);
                    $this->set('start', $selected_start);
                    $this->set('end', $selected_end);


                }
                if (!($data['assessment'] == 0)) {

                    $count = sizeof($Date);
                  //  debug($Date);
                    for ($x = 0; $x <= $count - 1; $x++) {
                        $date = $Date[$x];
                        // debug($date);
                        $completed_assessment->where(['completed_assessments.assessment_id' => $data['assessment']]);
                        $query = $this->completed_assessments->find("all", ['contain' => ['Assessment']])->where(['selected' => $date]);
                        $results = $query->toArray();
                        //debug($results);
                        if (!empty($results)) {
                            $assessment_name = $results[0]['assessment']['assessment_name'];
                              debug($assessment_name);
                        }
                        if (!empty($results)) {
                            if ($assessment_name != null) {

                                if (!in_array($assessment_name, $array_nvp)) {
                                    array_push($array_nvp, $assessment_name);
                                }


                            }

                        }

                        // if($date == '2020-07-23'){
                        // $query =  $completed_assessment->where([
                        //  ['selected' => $date]]);
                        //debug($query->toArray());
                        //  $results = $completed_assessment->toArray();
                        //  debug($results);
                        //
                        // }

                    }
                    //debug($array_nvp);
                    $this->set('name', $array_nvp);
                    $this->set('total', count($array_nvp));
                    $this->set('start', $selected_start);
                    $this->set('end', $selected_end);
                    $this->set('assessment_name',$assessment_name);

                    //  debug($selected_start);
                    //  debug($selected_end);
                }

            }
            if (isset($reports_generated)) {
                //  $results = $reports_generated->toArray();
             //   debug($Date);
                foreach ($Date as $date){
                  //  debug($date);
                    $reports_generated->where(['selected'=>$date]);
                    $results = $reports_generated->toArray();
                
                    if(!empty($results)){
                        debug($results);
                    }
                }
                 //foreach($reports_generated as $result) {
                 //    $assessment_name = $result["assessment"]["assessment_name"];

                   //  if (!in_array($assessment_name, $array_nvp)) {
                       //  array_push($array_nvp, $assessment_name);
                   //  }
               //  }
               // debug($reports_generated);
                $this->set('name',$array_nvp);
                $this->set('total',count($array_nvp));

            }
            //  debug($array_nvp);
            //   $selected_start =  date("Y-m-d");
            //      $selected_end = date("Y-m-d");
            //   $this->set('name',$array_nvp);
            //   $this->set('total',count($array_nvp));
            //   $this->set('start',$selected_start);
            //   $this->set('end',$selected_end);


        }




        $query = $this->Assessment->find('all');
        $assessment_arrays = $query->toArray();
         $assessment = ["0"=>"All"];
         foreach($assessment_arrays as $assessment_array){
              $id = $assessment_array['assessment_id'];
                $assessment[$id] =  $assessment_array['assessment_name'];
         }
        $clients = $this->CompletedAssessments->Clients->find('list', ['limit' => 200]);
        $this->set(compact('completedAssessment', 'assessment', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Completed Assessment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $completedAssessment = $this->CompletedAssessments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $completedAssessment = $this->CompletedAssessments->patchEntity($completedAssessment, $this->request->getData());
            if ($this->CompletedAssessments->save($completedAssessment)) {
                $this->Flash->success(__('The completed assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The completed assessment could not be saved. Please, try again.'));
        }
        $assessment = $this->CompletedAssessments->Assessment->find('list', ['limit' => 200]);
        $clients = $this->CompletedAssessments->Clients->find('list', ['limit' => 200]);
        $this->set(compact('completedAssessment', 'assessment', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Completed Assessment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $completedAssessment = $this->CompletedAssessments->get($id);
        if ($this->CompletedAssessments->delete($completedAssessment)) {
            $this->Flash->success(__('The completed assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The completed assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
