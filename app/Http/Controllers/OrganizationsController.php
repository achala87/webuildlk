<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\Organizations;
use App\Models\Organization_Reviews;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class OrganizationsController extends Controller
{

    /* Display organizations list */

    public function index() 
    {    
        if(request()->ajax()) {
            return datatables()->of(Organizations::select([
                'id', 'title' , 'district', 'created_at', 'address', 'avg_rating', 'description'
            ]))
            ->addIndexColumn()
            ->addColumn('action', function($data){
                   
                   $dataid = Crypt::encryptString($data->id);
                   $viewUrl = url(app()->getLocale().'/view-organization-rating-review/'.urlencode(htmlspecialchars($data->title)) ); 
                   $editUrl = url(app()->getLocale().'/edit-organization/'.$dataid ); 
                   $rateUrl = url(app()->getLocale().'/rate-organization/'.$dataid);
                   
                   $btn = ' <a style="display:block; width:50px; float:left;" class="ml-4" href="'.$rateUrl.'"data-id="'.$data->id.'" data-original-title="Rate" class="rateOrganization"><i class="fas fa-star-half-alt"></i>
                   <br>Rate</a>';

                   $btn = $btn.'<a class="ml-4" style="display:block; width:50px; float:left;" href="'.$viewUrl.'"data-original-title="Edit" class="edit"><i class="far fa-eye"></i>
                                                <br>View</a>';

                   $btn = $btn.'<a class="ml-4" style="display:block; width:50px; float:left;" href="'.$editUrl.'"data-original-title="View" class="view"><i class="far fa-edit"></i>
                                                <br>Edit</a>';


                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('list-organizations');
    }
    
    /* Display Organization add form */

    public function create()
    {
      return view('add-organization');
    }
    
    /* insert organization list into mysql database*/

    public function store(Request $request)
    {   //dd($request);
        $data = request()->validate([
        'title' => 'required',
        'district' => 'required',
        'org_type' => 'required',
        ]);
       
        $check = Organizations::create($data);
        //dd($check);
        if(!$check){
            App::abort(500, 'Error');
        }
        
        return redirect()->route('list-organizations', app()->getLocale())->withSuccess($check->title.' has been created.');
       // return Redirect::to("list-organizations")->withSuccess($check->title.' has been created.');
    }

    /*view organization details and reviews */

    public function view(Request $request, $ti)
    { 
        $title = urldecode(request()->segment(3));
       
        $data['organization'] = Organizations::where('title', $title)->first();
        // dd($data);
        if(!$data['organization']){
            return redirect()->route('list-organizations', app()->getLocale());
            //return redirect('/list-organizations');
         }
        return view('view-organization', $data);
    }

    /* display edit organization form with data */

    public function edit(Request $request, $id)
    {   //dd($id);
        $decrypted = Crypt::decryptString(request()->segment(3));
        $data['organization'] = Organizations::where('id', $decrypted)->first();


        if(!$data['organization']){
            return redirect()->route('list-organizations', app()->getLocale());
            //return redirect('/list-organizations');
         }
        return view('edit-organization', $data);
    }
    
    /* update Organization into mysql database */

    public function update(Request $request)
    {
        $data = request()->validate([
        'title' => 'sometimes|required',
        'description' => 'required',
        ]);
       
        if(!$request->id){
           return redirect()->route('list-organizations', app()->getLocale());
           //return redirect('/list');
        }

        $check = Organizations::where('id', $request->id)->update($data);
        return redirect()->route('list-organizations', app()->getLocale())->withSuccess('Organizatin details have been updated');
        //return Redirect::to("list")->withSuccess('Great! Organization has been updated');
    }  

    /* delete Organization from mysql database */

    public function delete(Request $request, $id)
    {
        //$check = Organizations::where('id', $id)->delete();
 
        return Response::json($check);
    }

    /* rate organization */

    public function set_org_rating(Request $request, $id)
    {  // dd(request()->segment(3));
        
        $decrypted = Crypt::decryptString(request()->segment(3));
        $data['tokenid'] = request()->segment(3);
        $data['organization'] = Organizations::where('id', $decrypted)->first();
        
        if(!$data['organization']){
           return redirect()->route('list-organizations', app()->getLocale()); 
           //return redirect('/list-organizations');
        }
        
        return view('rate_org', $data);
    }

    public function store_evidence(Request $request)
    {
         
        $validateImageData = $request->validate([
        'evidence' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg',
            'document.*' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        ]);
        if($request->hasfile('evidence'))
         {
            foreach($request->file('evidence') as $key => $file)
            {
                $path = $file->store('/user_uploads');
                $name = $file->getClientOriginalName();
                $insert[$key]['title'] = $name;
                $insert[$key]['path'] = $path;

                if(!move_uploaded_file($file,$path)){
                    echo json_encode('0'); die();
                 }
            }
         }
         echo json_encode($insert);
         die;
        //return redirect('rate-organization/1')->with('status', 'All files have been uploaded successfully');
    }


    
     /* insert organization_review into mysql database*/

     public function store_organization_rating(Request $request)
     {  
         //dd($request);
         $data = request()->validate([
         'description' => 'required',
         'from' => 'required'
         ]);

         $evidence_array = array();
         
         $review = new Organization_Reviews();
         $review->created_by_user_id = $request->user()->id;
         $review->description  = $request->description;
         $review->date_from = $request->from;
         $review->date_to = $request->to;
         $review->designation_of_officers = json_encode($request->officers);
         $review->service_saught = $request->service_requested;
         $review->service_recieved = $request->service_recieved;
         $review->service_quality = $request->service_quality;
         $review->process_clarity = $request->process_clarity;
         $review->efficiency_timeliness = $request->efficiency_timeliness;
         $review->days_taken_to_recieve_service = $request->no_days;
         
         $corruption = 0;
         $admin_level_corruption = $request->has('admin') ? 25 : 0;
         $executive_level_corruption = $request->has('executive') ? 25 : 0;
         $political_level_corruption = $request->has('political') ? 50 : 0;
         $corruption = $admin_level_corruption + $executive_level_corruption + $political_level_corruption;
         
         $review->bribery_corruption = $corruption;


         $evidence_array[] = $request->reference_no;
         $evidence_array[] = $request->evidence_path;

         $review->staff = 0;
         $review->meta_data =  json_encode(array(
            "admin" => $admin_level_corruption, 
            "executive" => $executive_level_corruption,
            "political" => $political_level_corruption )
        );

         //dd(json_encode($evidence_array));
         
         $review->evidence = json_encode($evidence_array);
         $review->note_to_organization_head = $request->msg_to_org;
         $review->send_user_information_to_authorities =  isset($request->send_user_information_to_authorities) ? $request->send_user_information_to_authorities : 0;
         $review->confirm_truthfullness = $request->correct_information;
         $review->status = 0;
         $review->rating = 0;

         //dd(request()->tokenid);
        
         //$decrypted = Crypt::decryptString();
         $review->organization_id = (int) Crypt::decryptString($request->tokenid);
         $check = $review->save();

         $org = Organizations::find($review->organization_id);
        
         $org_name = $org['title'];

         if($check){
            $request->session()->flash('sucessrating', 'Success!!! Rating of '.$org_name.' submitted. Thank you for being an active citizen.');
            //return redirect()->route('list-organizations');
            return redirect()->route('list-organizations', app()->getLocale());
        }else{
            $request->session()->flash('failrating','Failed!!! Please retry...');
            $responseData['id'] = $request->tokenid;
            //return redirect()->route('rate-organization', $responseData);
            return redirect()->route('list-organizations/'.$responseData['id'], app()->getLocale());
           // return Redirect::to("rate-organization")->with('org_id' -> $request->tokenid)->withFail('Organization review submission failed, please retry.');
         }
         //{{ session()->get( 'org_id' ) }}
     }

}

