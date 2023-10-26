<?php 

namespace Crm\Base\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected Model $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(Array $data)
    {
        foreach ($data as $key => $value) {
            $this->$model->{$key} = $value;
        }
        $this->model->save();
        return $this->model;
    }

    public function update(Array $data, $id)
    {
        $model = $this->model->findOrFail(data['id'] ?? 0);
        if(!$model) {
            return null;
        }

        foreach ($data as $key => $value) {
            $this->$model->{$key} = $value;
        }
        $this->model->save();
        return $this->model;
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        return $this->model = $model;
    }
}