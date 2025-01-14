<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPackageController extends Controller
{
    public function index()
    {
        $packages = Package::where('user_id', Auth::id())->paginate(10);

        return view('user.packages.index', compact('packages'));
    }

    public function show(Package $package)
    {
        if ($package->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this package.');
        }

        return view('user.packages.show', compact('package'));
    }

    public function search(Request $request)
    {
        $query = Package::where('user_id', Auth::id());

        if ($request->filled('tracking_number')) {
            $query->where('tracking_number', $request->tracking_number);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $packages = $query->paginate(10);

        return view('user.packages.index', compact('packages'));
    }
}
