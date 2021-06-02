<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PendingAssessments Controller
 *
 * @property \App\Model\Table\PendingAssessmentsTable $PendingAssessments
 *
 * @method \App\Model\Entity\PendingAssessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PendingAssessmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assessments', 'Clients'],
        ];
        $pendingAssessments = $this->paginate($this->PendingAssessments);

        $this->set(compact('pendingAssessments'));
    }

    /**
     * View method
     *
     * @param string|null $id Pending Assessment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pendingAssessment = $this->PendingAssessments->get($id, [
            'contain' => ['Assessments', 'Clients'],
        ]);

        $this->set('pendingAssessment', $pendingAssessment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pendingAssessment = $this->PendingAssessments->newEntity();
        if ($this->request->is('post')) {
            $pendingAssessment = $this->PendingAssessments->patchEntity($pendingAssessment, $this->request->getData());
            if ($this->PendingAssessments->save($pendingAssessment)) {
                $this->Flash->success(__('The pending assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending assessment could not be saved. Please, try again.'));
        }
        $assessments = $this->PendingAssessments->Assessments->find('list', ['limit' => 200]);
        $clients = $this->PendingAssessments->Clients->find('list', ['limit' => 200]);
        $this->set(compact('pendingAssessment', 'assessments', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pending Assessment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pendingAssessment = $this->PendingAssessments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pendingAssessment = $this->PendingAssessments->patchEntity($pendingAssessment, $this->request->getData());
            if ($this->PendingAssessments->save($pendingAssessment)) {
                $this->Flash->success(__('The pending assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending assessment could not be saved. Please, try again.'));
        }
        $assessments = $this->PendingAssessments->Assessments->find('list', ['limit' => 200]);
        $clients = $this->PendingAssessments->Clients->find('list', ['limit' => 200]);
        $this->set(compact('pendingAssessment', 'assessments', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pending Assessment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pendingAssessment = $this->PendingAssessments->get($id);
        if ($this->PendingAssessments->delete($pendingAssessment)) {
            $this->Flash->success(__('The pending assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The pending assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
