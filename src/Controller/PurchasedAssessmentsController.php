<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PurchasedAssessments Controller
 *
 * @property \App\Model\Table\PurchasedAssessmentsTable $PurchasedAssessments
 *
 * @method \App\Model\Entity\PurchasedAssessment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasedAssessmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assessment', 'Users'],
        ];
        $purchasedAssessments = $this->paginate($this->PurchasedAssessments);

        $this->set(compact('purchasedAssessments'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchased Assessment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchasedAssessment = $this->PurchasedAssessments->get($id, [
            'contain' => ['Assessment', 'Users'],
        ]);

        $this->set('purchasedAssessment', $purchasedAssessment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchasedAssessment = $this->PurchasedAssessments->newEntity();
        if ($this->request->is('post')) {
            $purchasedAssessment = $this->PurchasedAssessments->patchEntity($purchasedAssessment, $this->request->getData());
            if ($this->PurchasedAssessments->save($purchasedAssessment)) {
                $this->Flash->success(__('The purchased assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchased assessment could not be saved. Please, try again.'));
        }
        $assessment = $this->PurchasedAssessments->Assessment->find('list', ['limit' => 200]);
        $users = $this->PurchasedAssessments->Users->find('list', ['limit' => 200]);
        $this->set(compact('purchasedAssessment', 'assessment', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchased Assessment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchasedAssessment = $this->PurchasedAssessments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchasedAssessment = $this->PurchasedAssessments->patchEntity($purchasedAssessment, $this->request->getData());
            if ($this->PurchasedAssessments->save($purchasedAssessment)) {
                $this->Flash->success(__('The purchased assessment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchased assessment could not be saved. Please, try again.'));
        }
        $assessment = $this->PurchasedAssessments->Assessment->find('list', ['limit' => 200]);
        $users = $this->PurchasedAssessments->Users->find('list', ['limit' => 200]);
        $this->set(compact('purchasedAssessment', 'assessment', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchased Assessment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchasedAssessment = $this->PurchasedAssessments->get($id);
        if ($this->PurchasedAssessments->delete($purchasedAssessment)) {
            $this->Flash->success(__('The purchased assessment has been deleted.'));
        } else {
            $this->Flash->error(__('The purchased assessment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
