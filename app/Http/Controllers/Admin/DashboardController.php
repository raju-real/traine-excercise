<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $todayRegisterUsers = User::where('created_at', Carbon::today())->get();
        return view('admin.dashboard', compact('todayRegisterUsers'));
    }

    public function users() {
        $data = User::latest()->get();
        return view('admin.user_list', compact('data'));
    }

    public function subscribers() {
        $data = Subscriber::latest()->get();
        return view('admin.subscriber_list', compact('data'));
    }

    public function deleteSubscriber($id) {
        $data = Subscriber::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.subscribers')->with(setAlert('danger','Subscriber Deleted Successfully'));
    }

}
