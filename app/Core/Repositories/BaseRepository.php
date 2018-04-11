<?php

namespace App\Core\Repositories;

use App\Core\Exceptions\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository as PrettusRepository;
use Illuminate\Container\Container as Application;

class BaseRepository extends PrettusRepository implements BaseRepositoryContract
{

    /**
     * BaseRepository constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * Recupera o model definido.
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * Localiza se registro existe no banco de dados
     *
     * @param $id
     * @param array $columns
     * @return mixed|string
     */
    public function findWithoutFail($id, $columns = ['*'])
    {
        try{
            return $this->find($id, $columns);
        }catch (\Exception $e){
            return $e->getTraceAsString();
        }
    }

    /**
     * Instancia uma query para o model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->model->newQuery();
    }

    public function select(array $columns = ['*'])
    {
        return $this->model->newQuery()->select($columns);
    }

    public function findExists($column, $value)
    {
        $result = $this->model->newQuery()->where($column,$value)->get()->first();
        if(is_null($result)){
            throw new GeneralException("Não foi possível localizar nenhum registro no banco de dados");
        }else{
            return $result;
        }
    }

}