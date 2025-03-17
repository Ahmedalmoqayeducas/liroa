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
        if (!empty($this->fileName) && $this->file) {
            // حفظ الملف (مثال حفظه في public directory)
            $filePath = $this->file->store('files', 'public');
            $mimeType = $this->file->getMimeType();
            $size = $this->file->getSize();
            if ($this->folder != '') {
                $file = File::create([
                    'name' => $this->fileName,
                    'path' => $filePath,
                    'mime_type' => $mimeType,
                    'size' => $size,
                    'folder_id' => $this->folder,  // يمكنك تحديد المجلد إذا كنت تحتاج له
                    'admin_id' => auth()->user()->id, // تأكد من أنك تقوم بتخزين الـ admin_id بشكل صحيح
                ]);
            } else {
                $file = File::create([
                    'name' => $this->fileName,
                    'path' => $filePath,
                    'mime_type' => $mimeType,
                    'size' => $size,
                    'folder_id' => null,  // يمكنك تحديد المجلد إذا كنت تحتاج له
                    'admin_id' => auth()->user()->id, // تأكد من أنك تقوم بتخزين الـ admin_id بشكل صحيح
                ]);
            }
            // إعادة تعيين المدخلات
            $this->fileName = '';
            $this->file = null;

            // إغلاق المودال
            $this->dispatch('close-create-file-modal');
            $this->dispatch('list-render');
        }
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
