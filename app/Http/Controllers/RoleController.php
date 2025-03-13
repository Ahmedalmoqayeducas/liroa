<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Role::class,'role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Role::withCount('permissions')->paginate(20);
        return response()->view('pages.roles.read', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        // return response()->view('pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $guard = session('guard');
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            "guard_name'=>'required|string|in:$guard",
        ]);
        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->input('name');
            $role->guard_name = 'admin';
            $saved = $role->save();
            return response()->json(['status' => $saved, 'message' => $saved ? "Created Successfully" : "Created Failed"]);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        // $this->authorize('','');
        //
        return response()->view('pages.roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd('im hered');
        $role = Role::findOrFail($id);
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            // 'guard_name' => 'required|string|in:admin,user',
        ]);
        if (!$validator->fails()) {
            $role->name = $request->input('name');
            $role->guard_name = 'admin';
            $updated = $role->save();
            return response()->json(['status' => $updated, 'message' => $updated ? "Updated Succefully" : "Updated Falied"]);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function editRolePermissions(Request $request, Role $role)
    {

        $permissions = Permission::where('guard_name', '=', $role->guard_name)->get();
        $rolePermissions = $role->permissions;
        if (count($rolePermissions) > 0) {
            foreach ($rolePermissions as $rolePermission) {
                foreach ($permissions as $permission) {
                    if ($rolePermission->id == $permission->id) {
                        $permission->setAttribute('assigned', true);
                    }
                }
            }
        }
        return response()->view('pages.roles.role-permissions', ['role' => $role, 'permission' => $permissions]);
    }
    public function updateRolePermissions(Request $request, Role $role)
    {

        $validator = validator($request->all(), [
            'permission_id' => 'required|exists:permissions,id',
        ]);
        if (!$validator->fails()) {
            $permission = Permission::where('guard_name', '=', $role->guard_name)->findOrFail($request->input('permission_id'));
            if ($permission) {
                $role->hasPermissionTo($permission)
                    ? $role->revokePermissionTo($permission)
                    : $role->givePermissionTo($permission);

                return response()->json(['status' => true, 'message' => 'updated successfully'], Response::HTTP_OK);
            } else {
                return response()->json(['status' => false, 'message' => 'operation rejected'], Response::HTTP_FORBIDDEN);
            }
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    // public function updateRolePermissions(Request $request, Role $role)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'permission_id' => 'required|exists:permissions,id',
    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json(['status' => false, 'message' => $validator->errors()->first()], Response::HTTP_BAD_REQUEST);
    //         }

    //         $permission = Permission::where('guard_name', $role->guard_name)->find($request->input('permission_id'));

    //         if ($permission) {
    //             $role->hasPermissionTo($permission)
    //                 ? $role->revokePermissionTo($permission)
    //                 : $role->givePermissionTo($permission);

    //             return response()->json(['status' => true, 'message' => 'تم تحديث الصلاحية بنجاح'], Response::HTTP_OK);
    //         } else {
    //             return response()->json(['status' => false, 'message' => 'تم رفض العملية'], Response::HTTP_FORBIDDEN);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error("خطأ في تحديث الصلاحية: " . $e->getMessage());
    //         return response()->json(['status' => false, 'message' => 'حدث خطأ في السيرفر'], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deletedRow = Role::destroy($id);
        $deleted = $deletedRow > 0;
        return response()->json(['status' => $deleted, 'message' => $deleted ? "Deleted Successfully" : "Deleted Failed"]);
    }
}
