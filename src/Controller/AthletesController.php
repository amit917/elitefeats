<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Athletes Controller
 *
 * @property \App\Model\Table\AthletesTable $Athletes
 *
 * @method \App\Model\Entity\Athlete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AthletesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sports', 'Modules', 'Assessment'],
        ];
        $athletes = $this->paginate($this->Athletes);

        $this->set(compact('athletes'));
    }

    /**
     * View method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => ['Sports', 'Modules', 'Assessment'],
        ]);

        $this->set('athlete', $athlete);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $athlete = $this->Athletes->newEntity();
        if ($this->request->is('post')) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The {0} has been saved.', 'Athlete'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Athlete'));
        }
        $sports = $this->Athletes->Sports->find('list', ['limit' => 200]);
        $modules = $this->Athletes->Modules->find('list', ['limit' => 200]);
        $assessment = $this->Athletes->Assessment->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'sports', 'modules', 'assessment'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The {0} has been saved.', 'Athlete'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Athlete'));
        }
        $sports = $this->Athletes->Sports->find('list', ['limit' => 200]);
        $modules = $this->Athletes->Modules->find('list', ['limit' => 200]);
        $assessment = $this->Athletes->Assessment->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'sports', 'modules', 'assessment'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $athlete = $this->Athletes->get($id);
        if ($this->Athletes->delete($athlete)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Athlete'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Athlete'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
