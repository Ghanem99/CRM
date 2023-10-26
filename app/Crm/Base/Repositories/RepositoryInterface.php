<?php 

namespace Crm\Base\Repositories;

Interface RepositoryInterface
{
    public function all();

    public function find($id);

    public function create(Array $data);

    public function update(Array $data, $id);

    public function delete($id);
}