<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class PramukaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Dashboard::all();
        return view('dashboard', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isi' => 'required',
            'link' => 'required|min:5',
        ]);

        $title_change = strtolower($request->title);
        $title = ucwords($title_change);
        $link_change = strtolower($request->link);
        $link = str_replace(' ', '-', $request->link);
        $nama = explode(' ', Auth::user()->nama);

        Dashboard::create([
            'title' => $request->title,
            'isi' => $request->isi,
            'link' => $request->link,
            'penyusun' => Auth::user()->nama,
        ]);

        Alert::success('Selamat', 'Halaman berhasil di buat!');

        return redirect('/admin/page/show');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $title_change = strtolower($request->title);
        $title = ucwords($title_change);
        $link_change = strtolower($request->link);
        $link = str_replace(' ', '-', $link_change);
        $nama = explode(' ', Auth::user()->nama);

        Dashboard::where('id', $id)->update([
            'title' => $request->title,
            'isi' => $request->isi,
            'link' => $request->link,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pages = Dashboard::all();
        return view('admin.halaman', compact('pages'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Dashboard::where('id',$id)->first();
        return view('admin.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $id)->update(['role'=>1]);
        Alert::success('Berhasil menjadikan admin!');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        Alert::success('Berhasil menghapus user!');
        return redirect('/admin');
    }

    public function admin()
    {
        if(Auth::user()->role == 1)
        {
            $last_seen = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);
            $users = User::all();
            $total = User::all()->count();
            return view('admin.dashboard', compact('users', 'total'));
        }
        else
        {
            return view('bad-request');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Kamu Berhasil Logout!');
        return redirect('/');
    }

    public function pages($link)
    {
        $page = Dashboard::all();
        $pages = Dashboard::where('link', $link)->first();
        $penyusun = explode(" ", $pages['penyusun']);
        return view('pages',compact('pages', 'page', 'penyusun'));
    }

    public function create_pages()
    {
        return view('admin.create');
    }

    public function delete($id)
    {
        Dashboard::where('id', $id)->delete();
        Alert::success('Berhasil menghapus halaman!');
        return redirect('/admin/page/show');
    }
}
