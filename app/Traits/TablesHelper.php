<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait TablesHelper
{
    private $locales;
    private string $pageHeader;
    //route for CRUD -Route must be resource type
    private string $route;
    //array used to build datatable ajax in front end
    //show the table columns names in fronend
    private array $tableCols;
    private array $tableLabels;
    //create and edit modal form input name&id => types
    //values passed to action function must have same inputs keys and order
    private array $inputs = [];
    private array $retrieveVals = [];
    private array $transNames = [];
    private $createModal = true;




    public function setPageHeader(string $header = 'Edit Table')
    {
        $this->pageHeader = $header;
    }

    public function setCrudUrl(string $url)
    {
        $this->route = $url;
    }
    public function addDisplayCols(array $tableCols)
    {
        $this->tableCols = $tableCols;
    }
    public function setLocales($locales)
    {
        $this->locales = $locales;
    }
    public function addFieldInput(string $name, string $type = 'text', string $label, $required = true)
    {
        $fieldinput = ['name' => $name,'type' => $type,'label' => $label,'required' => $required];

        array_push($this->inputs, $fieldinput);
    }
    public function addImageInput(string $name, string $label, $required = true)
    {
        $fieldinput = ['name' => $name,'type' => 'image','label' => $label,'required' => $required];

        array_push($this->inputs, $fieldinput);
    }
    public function addSwitchInput(string $name, string $label = 'Active', $required = true)
    {
        $fieldinput = ['name' => $name,'type' => 'switch','label' => $label,'required' => $required];
        array_push($this->inputs, $fieldinput);

    }
    public function addTranslationInput(array $name, array $label, array $rows = [], array $required = [])
    {
        $fieldinput = ['name' => $name,'type' => 'translation','label' => $label,'rows' => $rows,'required' => $required];
        array_push($this->inputs, $fieldinput);

    }
    public function addSelectInput(string $name, array $options, $label = 'select', $required = true)
    {
        $fieldinput = ['name' => $name,'label' => $label,'type' => 'singleselect','options' => $options,'required' => $required];
        array_push($this->inputs, $fieldinput);

    }
    public function tableview()
    {
        //return view('master.table', compact('pagetitle', 'locales', 'route', 'tableCols', 'inputs'));
        return view('master.table', ['pagetitle' => $this->pageHeader,
                                        'locales' => $this->locales,
                                        'route' => $this->route,
                                        'tableCols' => $this->tableCols,
                                        'tableLabels' => $this->tableLabels,
                                        'inputs' => $this->inputs,
                                        'createModal' => $this->createModal,
                                        ]);
    }
    public function addImage($row, string $imgColumn = 'image', string $width = '100px')
    {
        $image = "<a href='" . $row->$imgColumn . "'><img style='width:" . $width . ";' src='" . $row->$imgColumn . "' ></a>";
        return $image;

    }

    // Add update and delete button
    //Values argument is the column names from table to pass to edit modal in frontend
    public function addAction($row, array $values, $viewbtn = true, $editbtn = true, $deletebtn = true)
    {
        $data = [];
        $this->retrieveVals = $values;
        foreach($values as $value) {
            //array_push($data, $row->$value);
            $data += [$value => $row->$value];
        }
        $endata = json_encode($data);
        $updateButton = "<button class='btn btn-secondary btn-sm editmodalbtn mx-1 '
        id='option-" . $row->id . "'
        data-id = '" . $row->id . "'
        data-column='" . $endata . "'
        data-bs-toggle='modal' 
        data-bs-target='#editModal' ><i class='ti-pencil-alt'></i></button>";
        $viewButton = "<button class='btn btn-secondary btn-sm viewmodalbtn mx-1 '
        id='option-" . $row->id . "'
        data-id = '" . $row->id . "'
        data-column='" . $endata . "'
        data-bs-toggle='modal' 
        data-bs-target='#viewModal' ><i class='fas fa-eye'></i></button>";
        // Delete Button
        if($deletebtn == false) {
            $disabled = 'disabled';
        } else {
            $disabled = '';
        }
        $deleteButton = "<button " . $disabled . " class='btn btn-sm btn-danger deletebtn' 
          data-id='" . $row->id . "'><i class='ti-trash'></i></button>";
        return "<div style='display:flex;' >"
                                    . ($viewbtn == true ? $viewButton : '') . " "
                                    . ($editbtn == true ? $updateButton : '') . " "
                                                 . $deleteButton . "</div>";
    }
    public function addTranslation($row, string $fieldName)
    {
        $final = '';
        $this->transNames += [$fieldName => $fieldName];
        foreach($row->translations as $trans) {
            $line = '<p>' . $trans->$fieldName . '</p>';
            $final = $final . $line;
        }
        return $final;
    }
    public function addSwitch($row, $active = false, $ColumnName = 'is_active')
    {
        $data = [];
        foreach($this->retrieveVals as $value) {
            // array_push($data, $value => $row->$value);
            if($value == 'translations') {
                foreach ($row->translations as $trans) {
                    foreach($this->transNames as $name) {
                        if(isset($trans->$name)) {
                            if(!isset($data[$trans->locale])) {
                                $data += [$trans->locale => [$name => $trans->$name]];
                            } else {
                                $data[$trans->locale] += [$name => $trans->$name];
                            }
                        }
                    }
                }
            } else {
                $data += [$value => $row->$value];
            }
        }
        $endata = json_encode($data);
        $switch = "<div  class='form-check form-switch form-control-lg'>
                    <input name ='is_active'
                    data-column = '" . $endata . "'
                    data-id = '" . $row->id . "'
                    class='form-check-input activatebtn' 
                     " . ($active === true ? '' : 'disabled') . " 
                     " . ($row->$ColumnName === 1 ? "checked='checked'" : '') . " 
                     type='checkbox' value='1' ></div>";
        return $switch;
    }
}
