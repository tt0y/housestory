<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoryRequest;
use App\Models\City;
use App\Models\House;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StoryCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Story::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/story');
        CRUD::setEntityNameStrings('story', 'stories');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('house_id');
        CRUD::column('label');
        CRUD::column('text');
        CRUD::column('user_id');
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
        CRUD::setValidation(StoryRequest::class);

        CRUD::column('house_id');
        CRUD::column('label');
        CRUD::column('text');
        CRUD::column('user_id');
        CRUD::column('active');
        CRUD::column('is_approved');

        $this->crud->AddFields([


            [
                'name' => 'house_id',
                'label' => __('house_id'),
                'type' => 'select2',

                'entity' => 'houses', // the method that defines the relationship in your Model
                'model' => House::class, // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'select_all' => true, // show Select All and Clear buttons?
            ], [
                'name' => 'label',
                'label' => __('label'),
                'type' => 'text',
            ], [
                'name' => 'text',
                'label' => __('text'),
                'type' => 'textarea',
            ], [
                'name' => 'active',
                'label' => __('active'),
                'type' => 'checkbox',
            ], [
                'name' => 'is_approved',
                'label' => __('is_approved'),
                'type' => 'checkbox',
            ], [
                'name' => 'user_id',
                'label' => __('user_id'),
                'type' => 'select',

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
