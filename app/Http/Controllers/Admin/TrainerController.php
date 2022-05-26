<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Trainer;
use App\TrainerTutorial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Trainer::query();
        $trainers = $data->get();
        return view('admin.trainer_list', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::orderBy('name','asc')->get();
        $title = "Add New Coach";
        $route = route('admin.coach.store');
        return view('admin.trainer_add_edit', compact('languages','title','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request,[
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required'
        ]);

        $coach = new Trainer();
        $coach->name = $request->name;
        $coach->mobile = $request->mobile;
        $coach->email = $request->email;

        if(isset($request->image) && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            //$image_resize->resize(987.75, 215.5);
            $image_resize->save('assets/images/' .$imageName);
            $coach->image = 'assets/images/'.$imageName;
        }
        $coach->save();
        
        if( (isset($request->languages) AND sizeof($request->files) > 0) && (count($request->languages) == count($request->file('files')))){
            foreach($request->file('files') as $key=>$file){
                $request->file('files')[$key];
                $name = Str::slug($request->languages[$key]);
                $uniqueFileName = time().'_' .$name. '.'.$file->getClientOriginalExtension();
                if (!file_exists('assets/audios/')) {
                    mkdir('assets/audios/', 0755, true);
                }
                $file->move('assets/audios/',$uniqueFileName);
                $user_document = new TrainerTutorial();
                $user_document->trainer_id = $coach->id;
                $user_document->language_id = $request->languages[$key];
                $user_document->file_name = 'assets/audios/'.$uniqueFileName;
                $user_document->save();
            }
        } 

        return redirect(route('admin.coach.index'))->with(setAlert('success','New Trainer Added Successfully'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Language::orderBy('name','asc')->get();
        $data = Trainer::findOrFail($id);
        $title = "Edit Coach";
        $route = route('admin.coach.update', $data->id);
        return view('admin.trainer_add_edit', compact('languages','title','route','data'));
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
        foreach($request->languages as $key=> $language) {
            //return $language;
            if(isset($request->file('files')[$language])) {
                dd($request->file('files')[$language]);
            }
            
        }
        return $request;
        $this->validate($request,[
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required'
        ]);

        $coach = Trainer::findOrFail($id);
        $coach->name = $request->name;
        $coach->mobile = $request->mobile;
        $coach->email = $request->email;

        if($file = $request->file('image')) {
            if(file_exists($coach->image) AND !empty($coach->image)){
                unlink($coach->image);
            }
            $image = $request->file('image');
            $name = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());              
            //$image_resize->resize(987.75, 215.5);
            $image_resize->save('images/' .$name);
            $imageName = 'images/'.$name;
            $coach->image = $imageName;
            
        } else{
                $imageName = $coach->image;
        }
        $coach->save();
        
        if( (isset($request->languages) AND sizeof($request->files) > 0) && (count($request->languages) == count($request->file('files')))){
            foreach($request->languages as $key=>$language){
                $file = $request->file('files')[$language];
                $name = Str::slug($request->languages[$key]);
                $uniqueFileName = time().'_' .$name. '.'.$file->getClientOriginalExtension();
                if (!file_exists('assets/audios/')) {
                    mkdir('assets/audios/', 0755, true);
                }
                $file->move('assets/audios/',$uniqueFileName);
                $user_document = new TrainerTutorial();
                $user_document->trainer_id = $coach->id;
                $user_document->language_id = $request->languages[$key];
                $user_document->file_name = 'assets/audios/'.$uniqueFileName;
                $user_document->save();
            }
        } 

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
