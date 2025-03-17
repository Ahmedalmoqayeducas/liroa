<?php

namespace App\Livewire;

use App\Models\File;
use App\Models\Folder;
use Livewire\Attributes\On;
use Livewire\Component;

// use Livewire\Component;

class FileList extends Component
{
    public $folders = [];     // لحفظ المجلدات
    public $files = [];       // لحفظ الملفات
    public $folder = '';
    public $type = '';
    function openFolder($id)
    {
        $this->folder = $id;
        $this->retrive();
        $this->dispatch("folderUpdated", $this->folder);
    }
    #[On('folderUpdatedFromSidebar')]
    public function folderUpdatedFromSidebarF($folderId)
    {
        $this->folder = $folderId;
        if($folderId == ''){
            $this->type = '';
        }
        $this->retrive();
    }

    #[On('list-render')]
    function retrive()
    {
        if ($this->type == 'trash') {
            if ($this->folder != '') {
                $this->folders = Folder::onlyTrashed()->where('parent_id', $this->folder)->orderBy('updated_at', 'desc')->get();
                $this->files = File::onlyTrashed()->where('folder_id', $this->folder)->orderBy('updated_at', 'desc')->get();
            } else {
                $this->folders = Folder::onlyTrashed()->whereNull('parent_id')->orderBy('updated_at', 'desc')->get();
                $this->files = File::onlyTrashed()->whereNull('folder_id')->orderBy('updated_at', 'desc')->get();
            }
        } else {
            if ($this->folder != '') {
                $this->folders = Folder::where('parent_id', $this->folder)->orderBy('updated_at', 'desc')->get();
                $this->files = File::where('folder_id', $this->folder)->orderBy('updated_at', 'desc')->get();
            } else {
                $this->folders = Folder::whereNull('parent_id')->orderBy('updated_at', 'desc')->get();
                $this->files = File::whereNull('folder_id')->orderBy('updated_at', 'desc')->get();
            }
        }
    }
    #[On('TrashFromSidebar')]
    public function TrashFromSidebarF()
    {
        $this->type = 'trash';
        $this->folder = '';
        $this->retrive();
    }

    #[On('deleteItem')]
    public function deleteItem($id, $type)
    {
        // dd($type);
        if ($type == "folder") {
            // العثور على العنصر (المجلد في هذه الحالة)
            $folder = Folder::find($id); // أو File::find إذا كان الملف هو العنصر

            if ($folder) {
                // حذف الملفات داخل المجلد (سوفت ديليت)
                $folder->files()->delete();

                // حذف المجلدات الفرعية بشكل متسلسل
                $this->deleteSubfolders($folder);

                // حذف المجلد نفسه (سوفت ديليت)
                $folder->delete();

                // رسالة نجاح
                session()->flash('message', 'Folder and its contents deleted successfully!');
            } else {
                // إذا لم يتم العثور على المجلد
                session()->flash('error', 'Folder not found.');
            }
            $this->retrive();
            $this->dispatch('folderDeleted');
        } elseif ($type == "file") {
            $file = File::find($id);
            $file->delete();
            $this->retrive();
            $this->dispatch('fileDeleted');
        }
    }

    // دالة لحذف المجلدات الفرعية بشكل متسلسل
    public function deleteSubfolders($folder)
    {
        // جلب المجلدات الفرعية لهذا المجلد
        $subfolders = $folder->subfolders;

        foreach ($subfolders as $subfolder) {
            // حذف الملفات داخل المجلد الفرعي (سوفت ديليت)
            $subfolder->files()->delete();

            // استدعاء الدالة بشكل تكراري لحذف المجلدات الفرعية للمجلد الفرعي
            $this->deleteSubfolders($subfolder);

            // حذف المجلد الفرعي نفسه (سوفت ديليت)
            $subfolder->delete();
        }
    }


    public function toggleAlbumVisibility($id)
    {
        $item = File::find($id); // أو Folder::find إذا كان المجلد
        if ($item) {
            $item->album_visible = !$item->album_visible;
            $item->save();
            session()->flash('message', 'Album visibility toggled');
        }
    }

    public function mount()
    {
        $this->retrive();
    }
    public function render()
    {
        return view('livewire.file-list');
    }
}
