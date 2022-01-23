<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;
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
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Vehicle = Vehicle::all();
        return view('vehicle.user_index',compact('Vehicle'));
    }
    public function users()
    {
        //
        $Vehicle = Vehicle::where('user_id', Auth::id())->get();
        $page_title = 'Datatables';
        return view('vehicle.user_index',compact('Vehicle','page_title'));
   

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add new Vehicle';
        return view('vehicle.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'vehicle_number' => 'required|max:30',
            'vehicle_type'=>'required|max:30',
            'user_type'=> 'required',
            'user_name'=> 'required',
            'user_number'=> 'required'
        ]);
        
        $Vehicle = new Vehicle();
        $Vehicle->vehicle_number=$request->vehicle_number;
        $Vehicle->vehicle_type=$request->vehicle_type;
        $Vehicle->in_time = Carbon::now();
        $Vehicle->user_type=$request->user_type;
        $Vehicle->user_name=$request->user_name;
        $Vehicle->user_number=$request->user_number;
        $Vehicle->status="With in hold";
        $Vehicle->society_id=Auth::user()->society_id;

        if($request->has('Driving_license_photo'))
        {
           
            $imageName = $request->vehicle_number.' Driving.'.$request->Driving_license_photo->extension();  
   
             $request->Driving_license_photo->move(public_path('public/vehicle'), $imageName);

            $Vehicle->Driving_license_photo = $imageName;

        }
        if($request->has('pollution_photo'))
        {
            $imageName = $request->vehicle_number.' Pollution certificate.'.$request->pollution_photo->extension();  
   
             $request->pollution_photo->move(public_path('public/vehicle'), $imageName);

            $Vehicle->pollution_photo = $imageName;
         }

        $Vehicle->vehicle_pass="VPASS".rand(100,9999);
        $Vehicle->save();

        return redirect('/admin/vehicle')->with('success','Vehicle added Successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Vehicle= Vehicle::findorfail($id);
        $page_title = 'Show vehicle details';
        return view('vehicle.show',compact('Vehicle','page_title'));
   
    }

    public function show2($id)
    {
        $inservice = DB::table('vehicles')
            ->where('id', '=', $id)
            ->update([
                'out_time' => Carbon::now(),
                'status' => 'O']);
        return redirect('/admin/vehicle');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Vehicle= Vehicle::findorfail($id);
        $page_title = 'Edit vehicle details';
        return view('vehicle.edit',compact('Vehicle','page_title'));
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
        //
        $Vehicle= Vehicle::findorfail($id);
        $this->validate($request, [
            'vehicle_number' => 'required|max:30',
            'vehicle_type'=>'required|max:30',
            'user_type'=> 'required'
        ]);
        
       // $Vehicle = new Vehicle();
        $Vehicle->vehicle_number=$request->vehicle_number;
        $Vehicle->vehicle_type=$request->vehicle_type;
        $Vehicle->user_type=$request->user_type;
        $Vehicle->status=$request->status;
      
        if($request->has('Driving_license_photo'))
        {
           // Storage::disk('gcs')->put($filename2, 'public/vehicle');
           
            $imageName = $request->vehicle_number.' Driving.'.$request->Driving_license_photo->extension();  
   
             $request->Driving_license_photo->move(public_path('public/vehicle'), $imageName);

            $Vehicle->Driving_license_photo = $imageName;

        }
        if($request->has('pollution_photo'))
        {
            $imageName = $request->vehicle_number.' Pollution certificate.'.$request->pollution_photo->extension();  
   
             $request->pollution_photo->move(public_path('public/vehicle'), $imageName);

            $Vehicle->pollution_photo = $imageName;
         }
        $Vehicle->update();

        return redirect()->back()
                        ->with('success','vehicle updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //deleting one by one
     public function destroy($id)
    {
        //
        $Visitor = Vehicle::findorfail($id);
        $Visitor->delete();
       return redirect()->route('visitor.index')
                        ->with('success','Visitor deleted successfully.');
    }

    public function delete(){
        $Vehicle = Vehicle::onlyTrashed()->get();
        $users = User::all();
        $page_title = 'Deleted | Vehicle';
       // $Visitor= Visitor::all();
        return view('vehicle.deleted',compact('Vehicle','users','page_title'));

    }
    public function restore($id){
        $Visitor = Vehicle::withTrashed()->find($id)->restore();
        $users = User::all();
        $page_title = 'Datatables';
       // $Visitor= Visitor::all();
       return redirect()->back()
                        ->with('success','Visitor restore successfully.');;
    }

    //deleting one by many
    public function del(request $request){
        $delid =$request->input('delid');
        Vehicle::where('id',$delid)->delete();
        return redirect()->route('vehicle.index')
                        ->with('success','All Selected vehicle deleted successfully.');
    
    }
}
