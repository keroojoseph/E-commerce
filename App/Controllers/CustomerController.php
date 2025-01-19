<?php

namespace App\Controllers;

use App\Libs\Helper;
use App\Libs\InputFilter;
use App\Models\AbstractModel;
use App\Models\CustomerModel;

class CustomerController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_language->load('customer.default');
        $this->_language->load('template.comman');
       $this->_data['customers'] = CustomerModel::getAll();
        $this->view();
    }

    public function addAction()
    {
        $this->_language->load('template.comman');
        if(isset($_POST['submit'])) {
            $customer = $this->getModel();
            if($customer->save()) {
                $_SESSION['message'] = 'Customer saved successfully';
                $this->redirect('/customer');
            }
        }
        $this->view();
    }

    public function editAction()
    {
        $this->_language->load('template.comman');
        $id = filter_var($this->_params[0], FILTER_SANITIZE_NUMBER_INT);
        $customer = CustomerModel::getByPK($id);

        if($customer == null) {
            $this->redirect('/customer');
        }

        $this->_data['user'] = $customer;

        if(isset($_POST['submit'])) {
            $customer = $this->getModel();
            $customer->customerId = $id;
            if($customer->save()) {
                $_SESSION['message'] = 'Customer saved successfully';
                $this->redirect('/customer');
            }
        }
        $this->view();
    }

    /**
     * @return CustomerModel
     */
    public function getModel()
    {
        $customer = new CustomerModel();
        $customer->name = $this->filterString($_POST['name']);
        $customer->phone = $this->filterString($_POST['phone']);
        $customer->email = $this->filterString($_POST['email']);
        $customer->address = $this->filterString($_POST['address']);
        $customer->city = $this->filterString($_POST['city']);
        $customer->zipCode = $this->filterString($_POST['zipCode']);
        return $customer;
    }

    public function deleteAction()
    {
        $this->_language->load('template.comman');
        $customer = new CustomerModel();
        $customer->customerId = filter_var($this->_params[0], FILTER_SANITIZE_NUMBER_INT);
        $this->view();
        if($customer->delete()) {
            $_SESSION['message'] = 'Customer deleted successfully';
            $this->redirect('/customer');
        }
    }


}