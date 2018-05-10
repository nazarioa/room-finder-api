<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Buildings Controller
 *
 * @property \App\Model\Table\BuildingsTable $Buildings
 *
 * @method \App\Model\Entity\Building[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Maps']
        ];
        $buildings = $this->paginate($this->Buildings);

        $this->set(compact('buildings'));
    }

    /**
     * View method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $building = $this->Buildings->get($id, [
            'contain' => ['Maps', 'Floors']
        ]);

        $this->set('building', $building);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $building = $this->Buildings->newEntity();
        if ($this->request->is('post')) {
            $building = $this->Buildings->patchEntity($building, $this->request->getData());
            if ($this->Buildings->save($building)) {
                $this->Flash->success(__('The building has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The building could not be saved. Please, try again.'));
        }
        $maps = $this->Buildings->Maps->find('list', ['limit' => 200]);
        $this->set(compact('building', 'maps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $building = $this->Buildings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $building = $this->Buildings->patchEntity($building, $this->request->getData());
            if ($this->Buildings->save($building)) {
                $this->Flash->success(__('The building has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The building could not be saved. Please, try again.'));
        }
        $maps = $this->Buildings->Maps->find('list', ['limit' => 200]);
        $this->set(compact('building', 'maps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $building = $this->Buildings->get($id);
        if ($this->Buildings->delete($building)) {
            $this->Flash->success(__('The building has been deleted.'));
        } else {
            $this->Flash->error(__('The building could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
