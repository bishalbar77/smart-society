<?php

namespace App\Http\Controllers;
use App\Membership;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;
use App\Transactions;
use App\Invoice;
use App\Account;
use App\Offer;
use App\Subscription;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade as PDF;
use Gate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Mail\SignupMail;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{

    public function index()
    {
        $users = User::all();
        $page_title = 'Employees';
        $posts = Post::all();

        return view('pages.employees', compact('page_title')) -> with([
            'users'=> $users,
            'posts'=> $posts,
        ]);
    }

    public function create()
    {
        $page_title = 'Society Registration';
        return view('pages.addcompany', compact('page_title'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'fname' => 'required',
            'phone1' => ['required', 'unique:posts', 'max:13'],
            'email1' => ['required', 'unique:posts', 'max:255'],
            'pincode1' => 'required',
            'city1' => 'required',
            'state1' => 'required',
            'country1' => 'required',
            'badd' => 'required',
            'password' => 'required',
        ]);
        $emailData = [
            'name' => $request->email1,
            'email' => $request->email1
        ];

        $posts = new Post;
        $posts->fname = $request->fname;
        $posts->phone1 = $request->phone1;
        $posts->email1 = $request->email1;
        $posts->pincode1 = $request->pincode1 ?? "No data";
        $posts->district1 = "No data";
        $posts->city1 = $request->city1 ?? "No data";
        $posts->state1 = $request->state1 ?? "No data";
        $posts->country1 = $request->country1;
        $posts->badd = $request->badd ?? "No data";
        $posts->badd2 = 'Y';
        $posts->save();

        $users = new User;
        $users->name = $request->fname;
        $users->ltname = 'Last Name';
        $users->dob = 'Date of Birth';
        $users->bgroup = 'O';
        $users->email = $request->email1;
        $users->phone = $request->phone1;
        $users->district = $request->district1;
        $users->country = 'India';
        $users->state = $request->state1;
        $users->city = $request->city1;
        $users->add = 'Address';
        $users->pincode = $request->pincode1;
        $users->password = Hash::make($request->password);
        $users->type = 'Society';
        $users->society_id = $posts->id;
        $users->save();
        $users->roles()->attach(6);
        $users->save();
        return redirect('/login');
    }

    public function show($id)
    {
        
        $posts = Post::find($id);
        return view('posts.show') -> with([
            'posts'=> $posts
        ]);
    }
    public function center($id)
    {
        $posts = Post::find($id);
        
        $user = DB::table('users')
        ->where('id', '=',$posts->user_id)
        ->first();
        $page_title = $posts->fname ;
        return view('posts.center', compact('page_title')) -> with([
            'posts'=> $posts,
            'user'=> $user
        ]);
    }
    public function yourcenter($id)
    {
        $posts = Post::find($id);
        if(Auth::user()->id==$posts->user_id)
        {
            $user = DB::table('users')
            ->where('id', '=',$posts->user_id)
            ->first();
            return view('posts.center') -> with([
                'posts'=> $posts,
                'user'=> $user
            ]);
        }
    }

    public function showdata(Post $posts)
    {

        $posts = Post::all();
        $page_title = 'Service Centers';

        return view('pages.show', compact('page_title')) -> with([
            'posts'=> $posts
        ]);
    }
    public function payments(Post $posts)
    {
        $posts = Post::all();
        $page_title = 'Billing Details';

        return view('biiling.servicepay', compact('page_title')) -> with([
            'posts'=> $posts
        ]);
    }
    public function edit($id)
    {
        // abort_if(Gate::denies('center_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $posts = Post::find($id);
        return view('posts.edit')->with([
            'posts' => $posts
           
        ]);
    }

    
    public function update(Request $request, Post $posts, $id)
    {
        $posts = Post::find($id);
        $posts->fname = $request->fname;
        $posts->email1 = $request->email1;
        $posts->phone1 = $request->phone1;
        $posts->badd = $request->badd;
        $posts->badd2 = $request->badd2;
        $posts->pincode1 = $request->pincode1;
        $posts->city1 = $request->city1;
        $posts->state1 = $request->state1;
        $posts->district1 = $request->district1;
        $posts->country1 = $request->country1;
        $posts->gst = $request->gst;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $profilepic = 'Business Logo';
            $filename = $profilepic . '.' . $ext;
            $file->move($posts->gst, $filename);
            $posts->image1 = $filename;
            
        }
        $posts->save();

        return redirect(route('yourservicecenter'));
    }

    public function editYourCenter($id)
    {
        $posts = Post::find($id);
        if(Auth::user()->id==$posts->user_id)
        {
            return view('posts.edit')->with([
                'posts' => $posts
            
            ]);
        }
    }

    public function changestatus($id)
    {
        abort_if(Gate::denies('delete-center'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $posts = Post::find($id);
        $posts->is_active=!$posts->is_active;

        if($posts->save())
        {
            return redirect(route('admin.users.index'));
        }
        else {
            return redirect(route('users.changestatus'));
        }
    }

    public function invoice($id)
    {
        $sale = SalesInvoice::find($id);
        $tax_amt = $sale->tax_amt/2;
        $FetchPostID = DB::table('posts')
        ->where('user_id', '=', Auth::user()->id)
        ->first();
        $FetchSaleInvoice = SalesInvoiceDetails::all();
        $services = Servicecenter::all();
        return view('pages.salesinvoice')->with([
            'services' => $services,
            'sale' => $sale,
            'FetchSaleInvoice' => $FetchSaleInvoice,
            'tax_amt' => $tax_amt,
            'FetchPostID' => $FetchPostID
        ]);
    }
    public function pdf($id)
    {
        $FetchSubcribeID = DB::table('subscriptions')
        ->where('post_id', '=', $id)
        ->first();

        $FetchTransactionID = DB::table('transactions')
        ->where('post_id', '=', $id)
        ->first();

        $post= Post::find($id);
        $pdf = PDF::loadview('posts.centerinvoicepdf1',[
            'post' => $post,
            'FetchSubcribeID' => $FetchSubcribeID,
            'FetchTransactionID' => $FetchTransactionID,
        ]);
       return $pdf->download('sales_invoice.pdf');
    }
    public function viewpdf($id)
    {
        $FetchSubcribeID = DB::table('subscriptions')
        ->where('post_id', '=', $id)
        ->first();

        $FetchTransactionID = DB::table('transactions')
        ->where('post_id', '=', $id)
        ->first();

        $post= Post::find($id);
        $pdf = PDF::loadview('posts.centerinvoicepdf',[
            'post' => $post,
            'FetchSubcribeID' => $FetchSubcribeID,
            'FetchTransactionID' => $FetchTransactionID,
        ]);
       return $pdf->stream();
    }
}
