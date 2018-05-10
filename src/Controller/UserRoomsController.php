<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserRooms Controller
 *
 * @property \App\Model\Table\UserRoomsTable $UserRooms
 *
 * @method \App\Model\Entity\UserRoom[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserRoomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Rooms']
        ];
        $userRooms = $this->paginate($this->UserRooms);

        $this->set(compact('userRooms'));
    }

    /**
     * View method
     *
     * @param string|null $id User Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRoom = $this->UserRooms->get($id, [
            'contain' => ['Users', 'Rooms']
        ]);

        $this->set('userRoom', $userRoom);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRoom = $this->UserRooms->newEntity();
        if ($this->request->is('post')) {
            $userRoom = $this->UserRooms->patchEntity($userRoom, $this->request->getData());
            if ($this->UserRooms->save($userRoom)) {
                $this->Flash->success(__('The user room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user room could not be saved. Please, try again.'));
        }
        $users = $this->UserRooms->Users->find('list', ['limit' => 200]);
        $rooms = $this->UserRooms->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('userRoom', 'users', 'rooms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Room id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRoom = $this->UserRooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRoom = $this->UserRooms->patchEntity($userRoom, $this->request->getData());
            if ($this->UserRooms->save($userRoom)) {
                $this->Flash->success(__('The user room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user room could not be saved. Please, try again.'));
        }
        $users = $this->UserRooms->Users->find('list', ['limit' => 200]);
        $rooms = $this->UserRooms->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('userRoom', 'users', 'rooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRoom = $this->UserRooms->get($id);
        if ($this->UserRooms->delete($userRoom)) {
            $this->Flash->success(__('The user room has been deleted.'));
        } else {
            $this->Flash->error(__('The user room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
