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
       $this->_data['customers'] = CustomerModel::getAll();
        $this->view();
    }

    public function addAction()
    {
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
        $customer = new CustomerModel();
        $customer->customerId = filter_var($this->_params[0], FILTER_SANITIZE_NUMBER_INT);
        $this->view();
        if($customer->delete()) {
            $_SESSION['message'] = 'Customer deleted successfully';
            $this->redirect('/customer');
        }
    }


}