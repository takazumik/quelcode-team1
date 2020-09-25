<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PointHistories Controller
 *
 * @property \App\Model\Table\PointHistoriesTable $PointHistories
 *
 * @method \App\Model\Entity\PointHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PointHistoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pointHistories = $this->paginate($this->PointHistories);

        $this->set(compact('pointHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Point History id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pointHistory = $this->PointHistories->get($id, [
            'contain' => [],
        ]);

        $this->set('pointHistory', $pointHistory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pointHistory = $this->PointHistories->newEntity();
        if ($this->request->is('post')) {
            $pointHistory = $this->PointHistories->patchEntity($pointHistory, $this->request->getData());
            if ($this->PointHistories->save($pointHistory)) {
                $this->Flash->success(__('The point history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The point history could not be saved. Please, try again.'));
        }
        $this->set(compact('pointHistory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Point History id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pointHistory = $this->PointHistories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pointHistory = $this->PointHistories->patchEntity($pointHistory, $this->request->getData());
            if ($this->PointHistories->save($pointHistory)) {
                $this->Flash->success(__('The point history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The point history could not be saved. Please, try again.'));
        }
        $this->set(compact('pointHistory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Point History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pointHistory = $this->PointHistories->get($id);
        if ($this->PointHistories->delete($pointHistory)) {
            $this->Flash->success(__('The point history has been deleted.'));
        } else {
            $this->Flash->error(__('The point history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
