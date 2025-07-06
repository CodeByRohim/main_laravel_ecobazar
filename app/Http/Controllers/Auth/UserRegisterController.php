<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRegisterController extends Controller
{
    public function createUser($id = null)
    {
         $editUser = User::find($id) ?? null;
        //  $brands = Brand::where('status',true)->latest()->get();
         $roles = Role::get();
        return view('Backend.RoleAndPermission.userCreate', compact('roles','editUser')); 
    }


public function storeOrUpdate(Request $request, $id = null)
{
   
    $rules = [
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
        'password' => $id ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
        'phone' => 'nullable|string|max:15',
        'position' => 'nullable|string|max:100',
        'department' => 'nullable|string|max:100',
        'image' => 'nullable|image|max:2048',
        'signature' => 'nullable|image|max:2048',
        'role' => 'required|string',
    ];

    $validated = $request->validate($rules);

    // Store file paths
    $imagePath = null;
    $signaturePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('users/images', 'private');
    }

    if ($request->hasFile('signature')) {
        $signaturePath = $request->file('signature')->store('users/signatures', 'private');
    }

    // Create or Update
    $user = $id ? User::findOrFail($id) : new User();

    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->phone = $validated['phone'] ?? null;
    $user->position = $validated['position'] ?? null;
    $user->department = $validated['department'] ?? null;
    $user->status = 1;
    $user->role = $validated['role'] ?? null;
    if ($request->filled('password')) {
        $user->password = Hash::make($validated['password']);
    }

    if ($imagePath) {
        // Delete old if exists
        if ($user->image && Storage::disk('private')->exists($user->image)) {
            Storage::disk('private')->delete($user->image);
        }
        $user->image = $imagePath;
    }

    if ($signaturePath) {
        // Delete old if exists
        if ($user->signature && Storage::disk('private')->exists($user->signature)) {
            Storage::disk('private')->delete($user->signature);
        }
        $user->signature = $signaturePath;
    }
    $user->save();
    return to_route('roleAndPermission.users')->with('success', $id ? 'User updated successfully!' : 'User created successfully!');
}

}
