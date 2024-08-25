<?php
/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Millat <[millat.techvill@gmail.com]>
 *
 * @created 07-09-2021
 */

namespace App\DataTables;

use App\Models\Permission;
use App\Models\Preference;
use Auth;
use Yajra\DataTables\Services\DataTable as BaseDataTable;

class DataTable extends BaseDataTable
{
    /**
     * prms
     *
     * @var mixed
     */
    public $prms;

    /**
     * preference
     *
     * @var mixed
     */
    public $preference;

    /**
     * addtitional data
     *
     * @var array
     */
    public $data = [];

    /*
    * DataTable Construct
    *
    * @return void
    */
    public function __construct()
    {
        $this->prms = Permission::getAuthUserPermission(optional(Auth::user())->id);
        $this->preference = preference();
    }

    /*
    * Has Permission
    *
    * @param array $permissions
    * @return bool
    */
    public function hasPermission(array $permissions): bool
    {
        return (array_intersect($permissions, $this->prms)) ? true : false;
    }

    /*
     * Render the DataTable
     *
     * @param string $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    public function render(?string $view = null, array $data = [], array $mergeData = [])
    {
        $this->setViewData();

        $mergedData = array_merge($this->data, $data);

        return parent::render($view, $mergedData, $mergeData);
    }

    /*
     * Set Additional Data
     * To be implemented in child classes
     */
    protected function setViewData()
    {
        // To be implemented in child classes
    }
}
