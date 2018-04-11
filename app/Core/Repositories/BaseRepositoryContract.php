<?php
/**
 * Created by PhpStorm.
 * User: 00545841240
 * Date: 11/04/2018
 * Time: 09:55
 */

namespace App\Core\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Contracts\RepositoryCriteriaInterface;

interface BaseRepositoryContract extends RepositoryInterface, RepositoryCriteriaInterface
{
    public function query();
    public function findWithoutFail($id, $columns = ['*']);
    public function select(array $columns = ['*']);
    public function findExists($column,$value);
}