<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagenes\ImagenesUsuarios;
use App\Models\Likes\LikesDislikes;
use Illuminate\Support\Facades\Auth;
use File;
use DB;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::user()) {
            $imagenesruta = ImagenesUsuarios::where('fk_own_user', Auth::user()->id)->first();
        }else{
           $imagenesruta = ''; 
        }
        
        $imagenes = ImagenesUsuarios::all();
        $imagenesmax = ImagenesUsuarios::orderBy('like', 'desc')->limit(3)->get();

        $imagenes3 = ImagenesUsuarios::all(); 
        // SELECT * FROM imagenes_usuarios ORDER BY `like` DESC LIMIT 3
                
        return view('welcome', compact('imagenes', 'imagenesmax', 'imagenesruta', 'imagenes3'));
    }



    public function like(Request $data){
          if ($data->ajax()) {

              $existe = LikesDislikes::where('fk_user', Auth::user()->id)
                  ->where('fk_imagenes_usuarios', $data->dato)->first();

                if ($existe) {
                    
                    $msg = 'ya voto';
                    return response()->json($msg);
                    }else{
                    (int)$like = 1;
                    $id = (int)$data->dato;
                    
                    $registro = ImagenesUsuarios::where('id', $id)
                      ->increment('like', 1); 


                    LikesDislikes::create([
                          'fk_user' => Auth::user()->id,
                          'fk_imagenes_usuarios' => $id
                        ]);  
                    
                }  


              } /*closed if ajax */             
    } /*closed function like */

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
        $ownid = Auth::user()->id;
        $existe = ImagenesUsuarios::where('fk_own_user', $ownid)->first();
        if ($existe) {
           return response()->json('ya existe');
        }else{
           foreach ($request->photos as $photo) {
            $filename = $photo->store('');
            ImagenesUsuarios::create([
                'src_imagen' => $filename,
                'fk_own_user' => $ownid
            ]);
          } 
        }
        // if ($existe) {
        //     if(File::exists(public_path('imagenes/'.$existe->src_imagen))){
        //        File::delete(public_path('imagenes/'.$existe->src_imagen));
        //       }
        //     File::delete(public_path().'/imagenes'.$existe->src_imagen);
        //     foreach ($request->photos as $photo) {
        //     $filename = $photo->store('');
        //     ImagenesUsuarios::where('fk_own_user', $ownid)
        //      ->update([
        //           'src_imagen' => $filename
        //         ]);
        //    }
            
        // }else{
            
            
        // }
        
        return 'Upload successful!';
    //     $e = $request->hasFile('photos');
    //     dd($e);
    // $photos = [];
    // foreach ($request->photos as $photo) {
    //     $filename = $photo->store('');
    //     dd($filename);
    //     $product_photo = ImagenesUsuarios::create([
    //         'src_imagen' => $photo
    //     ]);
 
    //     $photo_object = new \stdClass();
        
    //     $photo_object->size = round(Storage::size($filename) / 1024, 2);
    //     $photo_object->fileID = $product_photo->id;
    //     $photos[] = $photo_object;
    // }
 
    // return response()->json(array('files' => $photos), 200);
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
        //
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
