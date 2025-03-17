// Livewire.ready(function () {
    // الآن Livewire جاهز للعمل

    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            // تحديد جميع العناصر التي تريد إلغاء الزر الأيمن عليها
            const items = document.querySelectorAll('.file-card, .folder-card');

            items.forEach(item => {
                item.addEventListener('contextmenu', function (e) {
                    e.preventDefault(); // إلغاء قائمة السياق الافتراضية
                    showDropdownMenu(e, item); // عرض القائمة المنسدلة
                });
            });

            // دالة لعرض القائمة المنسدلة في المكان الصحيح
            function showDropdownMenu(e, item) {
                // إزالة أي قوائم منسدلة سابقة
                const existingMenu = document.querySelector('.dropdown-menu23');
                if (existingMenu) {
                    existingMenu.remove();
                }

                // إنشاء القائمة المنسدلة
                const menu = document.createElement('div');
                menu.classList.add('dropdown-menu23');
                menu.style.position = 'absolute';
                menu.style.left = `${e.pageX}px`;
                menu.style.top = `${e.pageY}px`;
                menu.style.zIndex = '1000'; // تأكد أن القائمة تظهر فوق العناصر الأخرى
                menu.innerHTML = `
                    <a class="dropdown-item" href="#" onclick="deleteItem(${item.dataset.id},'${item.dataset.type}')">
                        <i class="fas fa-trash-alt me-2"></i> Delete
                    </a>
                    `;
                    // <a class="dropdown-item" href="#" onclick="toggleAlbumVisibility(${item.dataset.id},'${item.dataset.type}')">
                    //     <i class="fas fa-eye-slash me-2"></i> Toggle Album Visibility
                    // </a>

                // إضافة القائمة إلى الصفحة
                document.body.appendChild(menu);

                // إخفاء القائمة عند النقر في أي مكان آخر
                document.addEventListener('click', function () {
                    menu.remove();
                }, { once: true });
            }
        }, 500); // تأخير الكود قليلاً للتأكد من أن Livewire جاهز
    });
// });

// دالة الحذف
function deleteItem(itemId,itemType) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // إذا وافق المستخدم على الحذف، نرسل الحدث إلى Livewire باستخدام dispatch
            Livewire.dispatch('deleteItem', [itemId,itemType]);

        } else {
            // إذا رفض المستخدم الحذف
            Swal.fire(
                'Cancelled',
                'Your file is safe.',
                'error'
            );
        }
    });
    Livewire.on('fileDeleted',()=>{
        Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        );
    });
    Livewire.on('folderDeleted',()=>{
        Swal.fire(
            'Deleted!',
            'Your folder has been deleted.',
            'success'
        );
    });
}

// دالة تغيير الرؤية
function toggleAlbumVisibility(itemId,itemType) {
    // إرسال الحدث إلى Livewire مع الـ ID باستخدام dispatch
    Livewire.dispatch('toggleAlbumVisibility', [itemId,itemType]);
}
