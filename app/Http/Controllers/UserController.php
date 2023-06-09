<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Validation\Rules;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function wishcount()
    {
        if (!auth()->user()) {
            return 0;
        } else {
            return wishlist::where('user_id', auth()->user()->id)->count();
        }
    }

    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {
            return Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
    }


    public function index()
    {
        $itemsincart = $this->include();
       $wishcounts=$this->wishcount();


        $user=User::all();
        // dd($categories);

        return view('user.myprofile',compact('user','itemsincart','wishcounts'));
    }

    public function edit($id)
{
    $wishcounts=$this->wishcount();

    $user = User::find($id);
    return view('user.profileedit', compact('user','wishcounts'));
}

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
            'image_url' => 'required|image|mimes:jpg,jpeg,png',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);
        $data['password'] = Hash::make($data['password']);


        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $name);
            $data['image_url'] = $name;
        }

        $user = User::find($id);
        $user->update($data);
       

        return redirect(route('user.myprofile'))->with('success', 'Profile updated successfully!');
    }

    

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.registeruser.index'))->with('success','Deleted sucessfully!');

    }
}
