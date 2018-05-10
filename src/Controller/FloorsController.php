<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Floors Controller
 *
 * @property \App\Model\Table\FloorsTable $Floors
 *
 * @method \App\Model\Entity\Floor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FloorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Buildings']
        ];
        $floors = $this->paginate($this->Floors);

        $this->set(compact('floors'));
    }

    /**
     * View method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $floor = $this->Floors->get($id, [
            'contain' => ['Buildings', 'Floors', 'Rooms']
        ]);

        $this->set('floor', $floor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $floor = $this->Floors->newEntity();
        if ($this->request->is('post')) {
            $floor = $this->Floors->patchEntity($floor, $this->request->getData());
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('The floor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The floor could not be saved. Please, try again.'));
        }
        $buildings = $this->Floors->Buildings->find('list', ['limit' => 200]);
        $this->set(compact('floor', 'buildings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $floor = $this->Floors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $floor = $this->Floors->patchEntity($floor, $this->request->getData());
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('The floor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The floor could not be saved. Please, try again.'));
        }
        $buildings = $this->Floors->Buildings->find('list', ['limit' => 200]);
        $this->set(compact('floor', 'buildings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floor = $this->Floors->get($id);
        if ($this->Floors->delete($floor)) {
            $this->Flash->success(__('The floor has been deleted.'));
        } else {
            $this->Flash->error(__('The floor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
