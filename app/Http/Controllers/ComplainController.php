<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complain;
use App\Owner;
class ComplainController extends Controller
{
    public function addticket()
    {
        $user = Owner::all();
        $page_title = 'Raise Ticket';
        return view('complain.create', compact('page_title'))->with([
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {  
        $rent = new Complain;
        $rent->name = $request->name;
        $rent->email = $request->email;
        $rent->phone = $request->phone;
        $rent->ticket = "CTIK" . rand(100,9999);
        $rent->flat_no = $request->flat_no;
        $rent->issue = $request->issue;
        $rent->type = $request->type;
        $rent->subject = $request->subject;
        $rent->save();
        $user = User::all();
        $rent = Complain::all();
        $page_title = 'Complain Logs';
        return view('complain.datatables', compact('page_title')) -> with([
            'rent' => $rent,
            'user' => $user,
            ]
        );
    }

    public function index()
    {
        $user = User::all();
        $rent = Complain::all();
        $page_title = 'Complain Logs';
        return view('complain.datatables', compact('page_title')) -> with([
            'rent' => $rent,
            'user' => $user,
            ]
        );
    }

    public function changestatus($id)
    {
        $user = Complain::find($id);
        $user->is_active=!$user->is_active;
        
        if($user->save())
        {
  
            return redirect()->back();
        }
        else {
           
            return redirect(route('ticket.changestatus'));
            
        }
    }

    public function change($id)
    {
        $user = Complain::find($id);
        $user->is_assigned=!$user->is_assigned;
        
        if($user->save())
        {
  
            return redirect()->back();
        }
        else {
           
            return redirect(route('ticket.change'));
            
        }
    }
}
