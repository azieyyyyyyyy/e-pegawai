<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NotisAkaunBaru;
use App\Notifications\NotisAkaunBaru as NotificationsNotisAkaunBaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiUsers = User::all();

        if (session('type') && session('message'))
        {
            $type = session('type');
            $message = session('message');
        }
        else
        {
            $type = 'primary';
            $message = 'Sila tambah user baru';
        }

        return view('users.index', compact('senaraiUsers', 'type', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.borang-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required', 'min:3'],
            'email' => ['required', 'email:filter'],
            'password' => ['required', Password::min(3)],
            'role' => ['required', 'in:'. User::ruleRole() ],
            'status' => ['required', 'in:'. User::ruleStatus() ]
        ]);

        // Dump and die
        // dd($data);

        // Simpan data ke dalam table users
        $user = User::create($data);

        // Hantar email notis akaun baru kepada user baru tersebut
        Mail::to($user->email)->send(new NotisAkaunBaru($user));

        //Hantar notifikasi kepada user tersebut
        $user->notify(new NotificationsNotisAkaunBaru($user));

        // Final response. redirect ke senarai users
        return redirect()->route('users.index')
        ->with('type', 'success')
        ->with('message', 'Rekod berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.borang-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return redirect()->route('users.index');
    }
}