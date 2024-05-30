<?php
namespace domain\services;
use Log;
use App\Models\Student; // Import the Storage facade
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    protected $task;
    public function __construct()
    {
        $this->task = new Student();
    }

    public function all()
    {
        return $this->task->all();
        // dd($response);
        // return view('pages.student.index')->with($response);
    }

    public function get ($task_id)
    {
        return $this->task->find($task_id);
    }

    public function add( $data)
    {

        
        if ($data['image']) {
            $imagePath = Storage::disk('public')->put('images', $data['image']);
            $data['image'] = basename($imagePath);
            FacadesLog::info('Stored image path: ' . $imagePath); // Log the stored image path
        }

        $this->task->create($data);
        // return redirect()->back();
        // return redirect()->route('student');
    }

    public function delete($task_id)
    {
        $task =$this->task->find($task_id);
        if ($task->image) {
            Storage::delete('public/images/' . $task->image);
        }
        $task->delete();
        // return redirect()->back();
    }
    public function done($task_id)
    {
        $task =$this->task->find($task_id);
        $task->status = 'Active';
        $task->update();
        // return redirect()->back();
    }

    public function update(array $data , $task_id)
    {
        $task =$this->task->find($task_id);
        //image update
        if (isset($data['image'])) {
            // Delete the old image if it exists
            if ($task->image) {
                Storage::delete('public/images/' . $task->image);
            }
            // Store the new image
            $imagePath = Storage::disk('public')->put('images', $data['image']);
            $data['image'] = basename($imagePath);
            FacadesLog::info('Updated image path: ' . $imagePath); // Log the updated image path
        }
        $task->update($this->edit($task,$data));
    }

    protected function edit(Student $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }
}


?>