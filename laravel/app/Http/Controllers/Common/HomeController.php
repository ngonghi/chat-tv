<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function getIndex() {
        if(Session::has('username')) {
            return redirect('/chat');
        }
        return view('home.index');
    }

    public function postIndex(Request $request) {
        $this->validate($request, [
            'username' => 'required|max:20',
        ]);
        $username = $request->get('username');
        Session::put('username', $username);
        return redirect('/chat');
    }

    public function getChat() {
        if(!Session::has('username')) {
            return redirect('/');
        }
        return view('home.chat');
    }

    public function getLogout() {
        Session::forget('username');
        return redirect('/');
    }
}
