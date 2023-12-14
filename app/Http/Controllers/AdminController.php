<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\order;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\CategoryType;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function AdminDashboard(){

        $newCustomersCount = User::whereDate('created_at', today())->count();
        $orderCount = order::whereDate('created_at', today())->count();
        $todayCount = User::whereDate('created_at', Carbon::today())->count();

        // Get the count of users registered yesterday
        $yesterdayCount = User::whereDate('created_at', Carbon::yesterday())->count();

        // Calculate the growth percentage
        $growthPercentage = ($todayCount - $yesterdayCount) / ($yesterdayCount == 0 ? 1 : $yesterdayCount) * 100;

        $newCategoryTypeCount = CategoryType::count();

        $newSubCategoryCount = SubCategory::count();

        $productcount = Product::count();

        return view('admin.index',compact('newCustomersCount', 'orderCount', 'growthPercentage', 'newCategoryTypeCount', 'newSubCategoryCount', 'productcount')) ;

    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->Phone = $request->Phone;
        $data->Address = $request->Address;

        if($request->file('Photo')){
            $file = $request->file('Photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['Photo'] = $filename;
        }

        $data->save();

        return redirect()->back();

    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request)
{
    // Assuming you have authenticated the user
    $user = Auth::user();

    // Update the password for the authenticated user
    $user->update([
        'password' => Hash::make($request->new_password)
    ]);

    return redirect()->back();
}

   

}
