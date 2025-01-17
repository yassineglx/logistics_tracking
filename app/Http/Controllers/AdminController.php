<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transporter;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $users = User::all();
        $transporters = Transporter::all();
        $packages = Package::all();

        return view('admin.dashboard', compact('users', 'transporters', 'packages'));
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    // Store User
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:Admin,User,Transporter',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User created successfully.');
    }
    public function manageUsers(Request $request)
    {
        $query = User::query();
    
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
    
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }
    
        $users = $query->paginate(10);
        return view('admin.manage-users', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.edit-users', compact('user'));
    }


    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:Admin,User,Transporter',
        ]);

        $user->update($validated);

        return redirect()->route('admin.manage-users')->with('success', 'User updated successfully.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully.');
    }

    public function createTransporter()
    {
        $users = User::where('role', 'User')->get();
        return view('admin.create-transporter',compact('users'));
    }

    // Store Transporter
    public function storeTransporter(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:transporters',
            'vehicle_type' => 'required|string',
            'license_plate' => 'required|unique:transporters',
            'availability_status' => 'required|in:Available,Busy',
            'user_id' => 'required|exists:users,id'
        ]);

        Transporter::create($validated);

        return redirect()->route('admin.manage-transporters')->with('success', 'Transporter created successfully.');
    }
    public function manageTransporters()
    {
       
        $transporters = Transporter::paginate(10);
        return view('admin.manage-transporters', compact('transporters'));
    }


    public function editTransporter(Transporter $transporter)
    {
        $users = User::where('role', 'User')->get();
        return view('admin.edit-transporter', compact('transporter','users'));
    }


    public function updateTransporter(Request $request, Transporter $transporter)
    {
        // 'license_plate' => 'required|string',
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:transporters,phone,' . $transporter->id,
            'vehicle_type' => 'required|string',
            'availability_status' => 'required|in:Available,Busy',
            'user_id' => 'required|exists:users,id'
        ]);

        $transporter->update($validated);

        return redirect()->route('admin.manage-transporters')->with('success', 'Transporter updated successfully.');
    }


    public function deleteTransporter(Transporter $transporter)
    {
        $transporter->delete();
        return redirect()->route('admin.manage-transporters')->with('success', 'Transporter deleted successfully.');
    }
    public function createPackage()
    {
        $users = User::where('role', 'User')->get();
        $transporters = User::where('role', 'Transporter')->get();
        return view('admin.create-package', compact('users','transporters'));
    }

    // Store Package
    public function storePackage(Request $request)
    {
        // 'user_id' => 'required|exists:users,id',
        $validated = $request->validate([
            'sender' => 'required|string',
            'receiver' => 'required|string',
            'tracking_number' => 'required|unique:packages',
            'status' => 'required|in:Pending,In-Transit,Delivered',
            'description' => 'nullable|string',
            'delivery_date' => 'nullable|date',
        ]);

        Package::create($validated);

        return redirect()->route('admin.manage-packages')->with('success', 'Package created successfully.');
    }

    public function managePackages()
    {
        $packages = Package::paginate(10);
        return view('admin.manage-packages', compact('packages'));
    }


    public function editPackage(Package $package)
    {
        $users = User::where('role', 'User')->get();
        $transporters = User::where('role', 'Transporter')->get();
        return view('admin.edit-packages', compact('package', 'users' , 'transporters'));
    }


    public function updatePackage(Request $request, Package $package)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'sender' => 'required|exists:users,id',
            'receiver' => 'required|exists:users,id',
            'transporter_id' => 'required|exists:users,id',
            'tracking_number' => 'required|unique:packages,tracking_number,' . $package->id,
            'status' => 'required|in:Pending,In-Transit,Delivered',
            'description' => 'nullable|string',
            'delivery_date' => 'nullable|date',
        ]);

        $package->update($validated);

        return redirect()->route('admin.manage-packages')->with('success', 'Package updated successfully.');
    }


    public function deletePackage(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.manage-packages')->with('success', 'Package deleted successfully.');
    }



    public function assignPackageForm(Package $package)
    {
        $users = User::where('role', 'User')->get(); 
        return view('admin.assign-package', compact('package', 'users'));
    }
    
    public function assignPackage(Request $request, Package $package)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
    
        $package->update(['user_id' => $validated['user_id']]);
    
        return redirect()->route('admin.manage-packages')->with('success', 'Package assigned successfully.');
    }





}
