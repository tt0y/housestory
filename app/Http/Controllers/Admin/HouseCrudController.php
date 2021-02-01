<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HouseRequest;
use App\Models\City;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Auth;

/**
 * Class HouseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HouseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\House::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/house');
        CRUD::setEntityNameStrings('house', 'houses');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('street_name');
        CRUD::column('house_no');
        CRUD::column('house_building');
        CRUD::column('postcode');
        CRUD::column('active');
        CRUD::column('is_approved');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(HouseRequest::class);

        if (Auth::check()) {
            /**
             * После проверки уже можешь получать любое свойство модели
             * пользователя через фасад Auth, например id
             */
            $user = (int)Auth::user()->id;
        }

        $this->crud->AddFields([

            [
                'name' => 'name',
                'label' => __('name'),
                'type' => 'text',
            ], [
                'name' => 'street_name',
                'label' => __('street_name'),
                'type' => 'text',
            ], [
                'name' => 'house_no',
                'label' => __('house_no'),
                'type' => 'text',
            ], [
                'name' => 'house_building',
                'label' => __('house_building'),
                'type' => 'number',
            ], [
                'name' => 'postcode',
                'label' => __('postcode'),
                'type' => 'number',
            ], [
                'name' => 'lat',
                'label' => __('lat'),
                'type' => 'text',
            ], [
                'name' => 'lon',
                'label' => __('lon'),
                'type' => 'text',
            ], [
                'name' => 'active',
                'label' => __('active'),
                'type' => 'checkbox',
            ], [
                'name' => 'is_approved',
                'label' => __('is_approved'),
                'type' => 'checkbox',
            ], [
                'name' => 'city_id',
                'label' => __('city_id'),
                'type' => 'select2',

                'entity' => 'cities', // the method that defines the relationship in your Model
                'model' => City::class, // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'select_all' => true, // show Select All and Clear buttons?
            ], [
                'name' => 'user_id',
                'label' => __('user_id'),
                'type' => 'select2',

                'entity' => 'users', // the method that defines the relationship in your Model
                'model' => User::class, // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'select_all' => true, // show Select All and Clear buttons?
            ]
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
