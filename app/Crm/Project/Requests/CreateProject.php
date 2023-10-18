<?php 

namespace Crm\Project\Services;
use Crm\Project\Models\Project;
use Illuminate\Support\Facades\Auth;
use Crm\Base\Services\ApiRequest;

class CreateProject extends ApiRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'customer_id' => 'required|integer',
            'project_cost' => 'required|integer',
        ];
    }
}