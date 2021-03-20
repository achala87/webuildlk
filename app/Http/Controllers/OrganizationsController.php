<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\Organizations;

class OrganizationsController extends Controller
{
    /* Display organizations list */

    public function index() 
    {
        if(request()->ajax()) {
            return datatables()->of(Organizations::select([
                'id','title' , 'district', 'created_at', 'address', 'avg_rating', 'description'
            ]))
            ->addIndexColumn()
            ->addColumn('action', function($data){
                   
                   $editUrl = url('edit-organization/'.$data->id);
                   $rateUrl = url('rate-organization/'.$data->id);
                   $btn = '<a href="'.$editUrl.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm">Edit</a>';

                   //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteOrganization">Delete</a>';
                   $btn = $btn.' <a href="'.$rateUrl.'" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Rate" class="btn btn-info btn-sm rateOrganization">Rate</a>';


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
    {
        $data = request()->validate([
        'title' => 'required',
        'district' => 'required',
        'org_type' => 'required',
        ]);
       
        $check = Organizations::create($data);
        dd($data);
        return Redirect::to("list")->withSuccess('Organization has been created.');
    }

    /* display edit organization form with data */

    public function edit(Request $request, $id)
    {
       
        $data['organization'] = Organizations::where('id', $id)->first();

        if(!$data['organization']){
           return redirect('/list');
        }
        return view('edit-organization', $data);
    }
    
    /* update Organization into mysql database */

    public function update(Request $request)
    {
        $data = request()->validate([
        'title' => 'required',
        'description' => 'required',
        ]);
       
        if(!$request->id){
           return redirect('/list');
        }

        $check = Organizations::where('id', $request->id)->update($data);
        return Redirect::to("list")->withSuccess('Great! Organization has been updated');
    }  

    /* delete Organization from mysql database */

    public function delete(Request $request, $id)
    {
        $check = Organizations::where('id', $id)->delete();
 
        return Response::json($check);
    }

    /* rate organization step 01 */

    public function set_org_rating(Request $request, $id)
    { 
       
        $data['organization'] = Organizations::where('id', $id)->first();

        if(!$data['organization']){
           return redirect('/list-organizations');
        }
        
        return view('rate_org', $data);
    }

}
