<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transporter;
use App\Models\Package;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $users = User::all();
        $transporters = Transporter::all();
        $packages = Package::all();

        return view('admin.dashboard', compact('users', 'transporters', 'packages'));
    }

    /**
     * Manage users in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    /**
     * Show the form to edit a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    /**
     * Update a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Delete a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully.');
    }

    /**
     * Manage transporters in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function manageTransporters()
    {
        $transporters = Transporter::all();
        return view('admin.manage-transporters', compact('transporters'));
    }

    /**
     * Show the form to edit a transporter.
     *
     * @param  \App\Models\Transporter  $transporter
     * @return \Illuminate\View\View
     */
    public function editTransporter(Transporter $transporter)
    {
        return view('admin.edit-transporter', compact('transporter'));
    }

    /**
     * Update a transporter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transporter  $transporter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTransporter(Request $request, Transporter $transporter)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:transporters,phone,' . $transporter->id,
            'vehicle_type' => 'required|string',
            'license_plate' => 'required|string',
            'availability_status' => 'required|in:Available,Busy',
        ]);

        $transporter->update($validated);

        return redirect()->route('admin.manage-transporters')->with('success', 'Transporter updated successfully.');
    }

    /**
     * Delete a transporter.
     *
     * @param  \App\Models\Transporter  $transporter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTransporter(Transporter $transporter)
    {
        $transporter->delete();
        return redirect()->route('admin.manage-transporters')->with('success', 'Transporter deleted successfully.');
    }

    /**
     * Manage packages in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function managePackages()
    {
        $packages = Package::all();
        return view('admin.manage-packages', compact('packages'));
    }

    /**
     * Show the form to edit a package.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\View\View
     */
    public function editPackage(Package $package)
    {
        return view('admin.edit-package', compact('package'));
    }

    /**
     * Update a package.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePackage(Request $request, Package $package)
    {
        $validated = $request->validate([
            'sender' => 'required|string',
            'receiver' => 'required|string',
            'tracking_number' => 'required|unique:packages,tracking_number,' . $package->id,
            'status' => 'required|in:Pending,In-Transit,Delivered',
            'description' => 'nullable|string',
            'delivery_date' => 'nullable|date',
        ]);

        $package->update($validated);

        return redirect()->route('admin.manage-packages')->with('success', 'Package updated successfully.');
    }

    /**
     * Delete a package.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePackage(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.manage-packages')->with('success', 'Package deleted successfully.');
    }
}
