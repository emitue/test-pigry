<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\WeightLogRequest;

class WeightLogController extends Controller
{
    public function index()
    {
        $weightLogs = WeightLog::where('user_id',auth()->id())->orderBy('date', 'desc')->get();
        return view('admin', compact('weightLogs'));
    }

    public function admin()
    {
        $userId = Auth::id();

        $goalWeight = WeightTarget::where('user_id', $userId)->value('target_weight');

        $latestWeight = WeightLog::where('user_id', $userId)->orderBy('created_at', 'desc')->value('weight');

        return view('admin', compact('goalWeight', 'latestWeight'));
    }

    public function create()
    {
        return view('admin');
    }

    public function search(Request $request)
    {
        $userId = Auth::id();
        $from = $request->input('from');
        $to = $request->input('to');

        $query = WeightLog::where('user_id', $userId);

        if ($from && $to) {
            $query->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59']);
        }

        $results = $query->orderBy('created_at', 'desc')->get();
        $count = $results->count();

        return view('admin', compact('results', 'from', 'to', 'count'));
    }
    public function store(request $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('admin');
    }
    public function getStep1()
    {
        return view('register');
    }
    public function postStep1(LoginRequest $request)
    {
        $validated = $request->validated();

        Session::put('register_data', $validated);

        return redirect('step2');
    }
    public function getStep2()
    {
        $data = Session::get('register_data');
        if(!$data) {
        return redirect()->route('register');
        }

        return view('admin', compact('data'));
    }
    public function postStep2(WeightLogRequest $request)
    {
        $data = Session::get('register_data');
        if (!$data) {
            return redirect()->route('register');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'weight' => $request->weight,
        ]);


        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);


        Auth::login($user);


        Session::forget('register_data');


        return redirect('admin');
    }
    public function edit()
    {
        $userId = Auth::id();

        $goal = WeightTarget::where('user_id', $userId)->first();

        return view('goal', compact('goal'));
    }
    public function update(Request $request)
    {
        $userId = Auth::id();

        $goal = WeightTarget::firstOrNew(['user_id' => $userId]);

        $goal->target_weight = $request->target_weight;
        $goal->save();

        return redirect('admin');
    }
}
