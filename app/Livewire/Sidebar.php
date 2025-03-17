<?php

namespace App\Livewire;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Sidebar extends Component
{
    use WithFileUploads; // لتمكين رفع الملفات

    public $folderName = '';  // لحفظ اسم المجلد
    public $fileName = '';    // لحفظ اسم الملف
    public $file;             // لحفظ الملف نفسه
    public $files=[];             // لحفظ الملف نفسه
    public $folder = '';     // لحفظ المجلدات

    #[On('folderUpdated')]
    public function folderUpdatedf($folderId)
    {
        // تحديث المتغير بناءً على قيمة الحدث
        $this->folder = $folderId;
        // dd($this->folder);
        // $this->render(); // إعادة رسم المكون
    }

    public function home(){
        $this->folder='';
        $this->dispatch("folderUpdatedFromSidebar",'');
    }
    // دالة لفتح النافذة المنبثقة لإنشاء المجلد
    public function openCreateFolderModal()
    {
        $this->dispatch('open-create-folder-modal');
    }

    // دالة لإنشاء المجلد
    public function createFolder()
    {
        if (!empty($this->folderName)) {
            // إضافة المجلد إلى المصفوفة
            if ($this->folder != '') {
                Folder::create(['name' => $this->folderName, 'parent_id' => $this->folder, 'admin_id' => Auth::id()]);
            } else {
                Folder::create(['name' => $this->folderName, 'admin_id' => Auth::id()]);
            }
            // إعادة تعيين اسم المجلد
            $this->folderName = '';

            // إرسال رسالة نجاح
            session()->flash('message', 'Folder created successfully!');

            // إغلاق المودال
            $this->dispatch('close-create-folder-modal');
            $this->dispatch('list-render');
        }
    }

    // دالة لفتح النافذة المنبثقة لإنشاء الملف
    public function openCreateFileModal()
    {
        $this->dispatch('open-create-file-modal');
    }

    // دالة لإنشاء الملف
    public function createFile()
    {
        if (!empty($this->files)) {
            foreach ($this->files as $file) {
                $storedFile = $file->store('files', 'public');
                $mimeType = $file->getMimeType();
                $size = $file->getSize();

                File::create([
                    'name' => $file->getClientOriginalName(),
                    'path' => $storedFile,
                    'mime_type' => $mimeType,
                    'size' => $size,
                    'folder_id' => $this->folder ? $this->folder : null,
                    'admin_id' => auth()->user()->id,
                ]);
            }

            $this->files = []; // إعادة تعيين الملفات بعد الحفظ
            $this->fileName = ''; // إعادة تعيين الملفات بعد الحفظ
            session()->flash('message', 'Files uploaded successfully!');
            $this->dispatch('close-create-file-modal');
            $this->dispatch('list-render');
            $this->render();
        }
    }

    public function trash(){
        $this->dispatch("TrashFromSidebar");
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
