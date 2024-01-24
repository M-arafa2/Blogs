<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Department;
use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title, $department_id, $sub_department_id, $service_id, $description, $files = [];

    protected function rules()
    {
        return [
            'title' => 'required|max:191',
            'department_id' => 'required',
            'sub_department_id' => 'nullable',
            'service_id' => 'required',
            'description' => 'required',
            'files' => 'nullable',
            'files.*' => 'file',
        ];
    }


    public function render()
    {
        $departments = Department::get();

        $services = Service::get();

        return view('livewire.client.orders.create', compact('departments', 'services'));
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->files) {

            foreach ($this->files as $file) {

                $files[] = store_file($file, 'orders');
            }

            $data['files'] = json_encode($files);
        }

        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'pending';

        Order::create($data);

        $this->reset();

        session()->flash('تم إرسال الطلب بنجاح وجاري المراجعة.');

        return redirect()->route('orders');
    }
}
