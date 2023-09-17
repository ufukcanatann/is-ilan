<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Appeal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
          $rolid=Auth::user()->role_id;
        if($rolid==0){
            $ilanListesi=Advertisement::all();
            return view("front.advertisementlist",compact("ilanListesi"));
        }
        else {
            return view('admin.createadvertisement');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }

        $newCreate=new Advertisement();
        $newCreate->title=$request->title;
        $newCreate->description=$request->desc;
        $newCreate->save();
        return response()->json(["status"=>"200","mesaj"=>"Başarılı"]);
        


        //return Response()->json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }

    public function appeal($ilanid){
        $userid=Auth::user()->id;
        $newcreate=new Appeal();
        $newcreate->uye_id=$userid;
        $newcreate->basvuru_id=$ilanid;
        $newcreate->save();
        return Redirect::back()->withErrors(['msg' => 'Başvurunuz Alındı.']);
    }

    public function basvurular(){
      $basvurular = DB::select('SELECT ap.id,ad.title,us.name,ap.created_at FROM appeals ap, advertisements ad, users us WHERE us.id=ap.uye_id AND ad.id=ap.basvuru_id');
      return view("front.basvurular",compact("basvurular"));  
    }
}
