<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ConsumptionTax Controller
 *
 * @property \App\Model\Table\ConsumptionTaxTable $ConsumptionTax
 *
 * @method \App\Model\Entity\ConsumptionTax[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsumptionTaxController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $consumptionTax = $this->paginate($this->ConsumptionTax);

        $this->set(compact('consumptionTax'));
    }

    /**
     * View method
     *
     * @param string|null $id Consumption Tax id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consumptionTax = $this->ConsumptionTax->get($id, [
            'contain' => [],
        ]);

        $this->set('consumptionTax', $consumptionTax);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consumptionTax = $this->ConsumptionTax->newEntity();
        if ($this->request->is('post')) {
            $consumptionTax = $this->ConsumptionTax->patchEntity($consumptionTax, $this->request->getData());
            if ($this->ConsumptionTax->save($consumptionTax)) {
                $this->Flash->success(__('The consumption tax has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consumption tax could not be saved. Please, try again.'));
        }
        $this->set(compact('consumptionTax'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consumption Tax id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consumptionTax = $this->ConsumptionTax->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consumptionTax = $this->ConsumptionTax->patchEntity($consumptionTax, $this->request->getData());
            if ($this->ConsumptionTax->save($consumptionTax)) {
                $this->Flash->success(__('The consumption tax has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consumption tax could not be saved. Please, try again.'));
        }
        $this->set(compact('consumptionTax'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Consumption Tax id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consumptionTax = $this->ConsumptionTax->get($id);
        if ($this->ConsumptionTax->delete($consumptionTax)) {
            $this->Flash->success(__('The consumption tax has been deleted.'));
        } else {
            $this->Flash->error(__('The consumption tax could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
