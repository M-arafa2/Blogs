<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;
use App\Models\SupportInput;

class DepartmentQuestions extends Component
{
    public $dep, $label, $type, $question, $data = [];
    public $rules = [
        'label' => 'required',
        'type' => 'required|in:text,select',
        'data' => 'nullable|required_if:type,select'
    ];

    public function mount(Department $dep)
    {
        $this->dep = $dep;
        $this->data ? $this->data : ['..'];
    }
    public function render()
    {
        $departmentQuestions = $this->dep?->questions()->paginate(10);
        return view('livewire.admin.department-questions', compact('departmentQuestions'));
    }

    public function submit()
    {
        $data = $this->validate();
        // $data['data'] = json_encode(isset($data['data']) ? $data['data'] : [], JSON_UNESCAPED_UNICODE);
        $data['data'] = !is_null($data['data']) ? $data['data'] : [];
        if ($this->question) {
            $this->question->update($data);
            $message = 'تم تعديل السؤال بنجاح';
        } else {
            $this->dep->questions()->create($data);
            $message = 'تم إضافة السؤال بنجاح';

        }
        $this->reset([
            'label',
            'type',
            'question',
            'data'
        ]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => $message]);
    }

    public function edit(SupportInput $question)
    {
        $this->label = $question->label;
        $this->type = $question->type;
        $this->data = $question->data;
        $this->question = $question;
    }

    public function addNewData()
    {
        $this->data[] = '';
    }
    public function delete($key)
    {
        unset($this->data[$key]);
    }
}
