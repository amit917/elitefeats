<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PendingAssessment Controller
 *
 * @property \App\Model\Table\PendingAssessmentTable $PendingAssessment
 *
 * @method \App\Model\Entity\PendingAssessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PendingAssessmentController extends AppController
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
        $pendingAssessment = $this->paginate($this->PendingAssessment);

        $this->set(compact('pendingAssessment'));
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
        $pendingAssessment = $this->PendingAssessment->get($id, [
            'contain' => ['Assessment', 'Clients'],
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
        $pendingAssessment = $this->PendingAssessment->newEntity();
        if ($this->request->is('post')) {
            $pendingAssessment = $this->PendingAssessment->patchEntity($pendingAssessment, $this->request->getData());
            if ($this->PendingAssessment->save($pendingAssessment)) {
                $this->Flash->success(__('The pending assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending assessment could not be saved. Please, try again.'));
        }
        $assessment = $this->PendingAssessment->Assessment->find('list', ['limit' => 200]);
        $clients = $this->PendingAssessment->Clients->find('list', ['limit' => 200]);
        $this->set(compact('pendingAssessment', 'assessment', 'clients'));
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
        $pendingAssessment = $this->PendingAssessment->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pendingAssessment = $this->PendingAssessment->patchEntity($pendingAssessment, $this->request->getData());
            if ($this->PendingAssessment->save($pendingAssessment)) {
                $this->Flash->success(__('The pending assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending assessment could not be saved. Please, try again.'));
        }
        $assessment = $this->PendingAssessment->Assessment->find('list', ['limit' => 200]);
        $clients = $this->PendingAssessment->Clients->find('list', ['limit' => 200]);
        $this->set(compact('pendingAssessment', 'assessment', 'clients'));
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
        $pendingAssessment = $this->PendingAssessment->get($id);
        if ($this->PendingAssessment->delete($pendingAssessment)) {
            $this->Flash->success(__('The pending assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The pending assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
