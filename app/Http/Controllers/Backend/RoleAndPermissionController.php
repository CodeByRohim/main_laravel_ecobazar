<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionController extends Controller
{

    public function users(Request $request, $id = null)
{
    if ($request->ajax()) {
        $users = User::query();
    //  search filter manually apply (optional)
        if ($search = $request->input('search.value')) {
            $users->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('position', 'like', "%{$search}%")
                      ->orWhere('role', 'like', "%{$search}%")
                      ->orWhere('id', 'like', "%{$search}%")
                      ->orWhere('department', 'like', "%{$search}%");
            });
        }
        return DataTables()->of($users)
            ->addIndexColumn()

            ->addColumn('image', function ($item) {
                $url = $item->image
                    ? route('user.image', basename($item->image))
                    : 'https://motobros.com/wp-content/uploads/2024/09/no-image.jpeg';

                return "<img src='$url' class='img-fluid' style='width: 50px; height: 50px; object-fit: cover;'/>";
            })

           ->addColumn('signature', function ($item) {
                $url = $item->signature ? route('user.signature', basename($item->signature)) : 'https://motobros.com/wp-content/uploads/2024/09/no-image.jpeg';
                return "<img src='$url' class='img-fluid' style='width: 50px; height: 50px; object-fit: cover;'/>";
            })

            ->addColumn('name', function ($item) {
                return $item->name ?? 'N/A';
            })

            ->addColumn('position', function ($item) {
                return $item->position ?? 'N/A';
            })

            ->addColumn('email', function ($item) {
                return $item->email ?? 'N/A';
            })
            ->addColumn('role', function ($item) {
                return $item->role ?? 'N/A';
            })
            ->addColumn('user_id', function ($item) {
                return $item->id ?? 'N/A';
            })

            ->addColumn('department', function ($item) {
                return $item->department ?? 'N/A';
            })

            ->addColumn('status', function ($item) {
                return getGeneralStatus($item->status ?? 0);
            })

            ->addColumn('actions', function ($item) {
                $editUrl = route('update.user', $item->id);
                $deleteUrl = route('products.delete', $item->id);
                return "<div class='btn-group'>
                    <a href='$editUrl' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='$deleteUrl' class='btn btn-sm btn-danger'>Delete</a>
                </div>";
            })

            ->rawColumns(['image', 'signature', 'name', 'position', 'email','role', 'user_id', 'department', 'status', 'actions'])
            ->make(true);
    }

    $users = User::get();  
    return view('Backend.RoleAndPermission.users', compact('users'));
}

 public function liveUser(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()->where('status',true)->select('id', 'name');
        if($search) {
            $users = $users->whereLike('name', "%$search%");
        } 
        $users = $users->limit(3)->get();
      
        $resArray = [];
        
        foreach ($users as $user) {
            $resArray[] = [
                'id' => $user->id,
                'text' => $user->name,
            ];
        }
      
        return response()->json($resArray);
    }

public function permission($id = null)
{
    $role = null;
    $rolePermissions = [];

    if ($id) {
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
    }

    $permissions = Permission::all()->groupBy('group_name');

    return view('Backend.RoleAndPermission.permission', compact('role', 'rolePermissions', 'permissions'));
}


public function permissionStore(Request $request, $id)
{
    $role = Role::findOrFail($id);

    $request->validate([
        'permissions' => 'array|nullable',
        'permissions.*' => 'string|exists:permissions,name',
    ]);

    // Sync selected permissions
    $role->syncPermissions($request->permissions ?? []);

    return redirect()->back()->with('success', 'Permissions updated successfully!');
}



     public function showRole(Request $request){
        if ($request->ajax()) {
        //    $roles = Role::query()->with('permissions')->withCount('users');

        $roles = Role::query()->select('*')->with('permissions')->withCount('users');
    // search filter manually apply (optional)
        if ($search = $request->input('search.value')) {
            $roles->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")          
                      ->orWhere('id', 'like', "%{$search}%");
            });
        }
        return DataTables()->of($roles)
            ->addIndexColumn()
            ->addColumn('name', function ($item) {
                return $item->name ?? 'N/A';
            })

            ->addColumn('permission', function ($item) {
                $badges = '';
                foreach ($item->permissions as $permission) {
                    $badges .= "<span class='badge bg-primary m-1'>{$permission->name}</span>";
                }
                return $badges ?: 'No Permissions';
            })


            ->addColumn('actions', function ($item) {
                $userCount = $item->users_count ?? 0;

                $permissinCreateUrl = route('permission.create', $item->id);
                $assignRoleUrl = route('assignRole.user', $item->id);
                $permissionUrl = route('permission', $item->id);

                return "<div class='d-flex align-items-center gap-1'>
                    <a class='p-2 bg-primary rounded ' href='$permissinCreateUrl'><i class='bx text-white bx-pencil'></i></a>
                    <a class='p-2 bg-dark rounded position-relative me-1' href='$assignRoleUrl'>
                <i class='bx text-white bx-user'></i>
                <span style='
                    padding: 0px 6px;
                    font-size: 12px;
                    top: 3px;
                    right: 3px;
                    position: absolute;
                    background-color: #ffc107;
                    color: #000;
                    border-radius: 50%;
                '>$userCount</span>
            </a>

                    <a class='p-2 bg-secondary rounded' href='$permissionUrl'><i class='bx text-white bx-key'></i></a>
                </div>";
            })


            ->rawColumns(['name', 'permission', 'actions'])
            ->make(true);
    }

         return view('Backend.RoleAndPermission.role');
    }


    public function storeOrUpdateRole(Request $request,$id =null){

       $request->validate([
        'name' => 'required',
       ]);
       $role = Role::findOrNew($id);
       $role->name = $request->name;
       $role->save();
        if($id){
            return redirect()->back()->with('success', 'Role updated successfully');      
        }
        return redirect()->back()->with('success', 'Role created successfully');
    }
 


   public function storeAssignedRole(Request $request)
{
    $request->validate([
        'role_id' => 'required|exists:roles,id',
        'model_id' => 'required|exists:users,id',
    ]);

    $user = User::find($request->model_id);
    $role = Role::find($request->role_id);

    $user->syncRoles([$role->name]);

    return redirect()->route('role.assigned.users', $role->id)
                     ->with('success', 'Role assigned successfully!');
}


public function assignRoleShow(Request $request, $id = null)
{
  
    $role = Role::findOrFail($id);

    // Show only users with this role
    $assignedUsers = User::role($role->name)->get();

    // Show all users for assignment dropdown
    $allUsers = User::all();

    return view('Backend.RoleAndPermission.assignUserRole', [
        'role' => $role,
        'assignedUsers' => $assignedUsers,
        'allUsers' => $allUsers,
    ]);
}

public function createPermission()
{
    return view('Backend.RoleAndPermission.createPermission');
}


// dynamic permission store like seeder
public function storePermissionNew(Request $request)
{
    $request->validate([
        'group_name' => 'required|string',
        'action' => 'required|string',
    ]);

    $groupSlug = Str::slug($request->group_name, '-');
    $permissionName = strtolower($groupSlug . '-' . $request->action);

    Permission::firstOrCreate([
        'name' => $permissionName,
        'group_name' => $request->group_name,
        'guard_name' => 'web',
    ]);

    return redirect()->back()->with('success', 'Permission created successfully!');
}
// dynamic permission store like seeder end
}