<?php 

namespace Crm\Customer\Repositories;
use Crm\Customer\Models\Customer;
use Crm\Base\Repositories\Repository;

use Illuminate\Database\Eloquent\Model;

// the main idea of this class, is not to interact with the model directly from the service class
// but to interact with the model through this repository class
class CustomerRepository extends Repository 
{
    protected Model $model;

    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }
}