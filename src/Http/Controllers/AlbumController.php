<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Album;
use App\Albumimage;

use Illuminate\Http\Request;
use Image; //Intervention Image
use Illuminate\Support\Facades\Storage; //Laravel Filesystem


class AlbumController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index(){
		$allalbum=Album::orderBy('created_at', 'desc')->paginate(10);
      	return view('admin.album.index')->with('allalbum', $allalbum);		
	}
	public function create(){
		return view('admin.album.create');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
       'name'=> 'required',       
       'images'=> 'required',
      ]);
		$album= new Album;
		$album->name=$request->input('name');
		$album->save();
		$lastid=$album->id;

	    if ($request->hasFile('images')) {
	 
	        foreach($request->file('images') as $file){

	        	$albumimages= new Albumimage;
	 
	            //get filename with extension
	            $filenamewithextension = $file->getClientOriginalName();
	 
	            //get filename without extension
	            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
	 
	            //get file extension
	            $extension = $file->getClientOriginalExtension();
	 
	            //filename to store
	            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
	 
	            Storage::put('public/albumimages/'. $filenametostore, fopen($file, 'r+'));
	            Storage::put('public/albumimages/thumbnail/'. $filenametostore, fopen($file, 'r+'));
	 
	            //Resize image here
	            $thumbnailpath = public_path('storage/albumimages/thumbnail/'.$filenametostore);
	            // $thumbnailpath = '/home/alrayantyping/blog/storage/app/public/albumimages/thumbnail/'.$filenametostore;
	            echo "/n/n/n<h3>Image file size is very big check image size and upload, go back and upload new image</h3>";
	            if($img = Image::make($thumbnailpath)->resize(350, 210, function($constraint) {
	                $constraint->aspectRatio(); }) )
	            {
	            	$img->save($thumbnailpath);
		            $albumimages->images=$filenametostore;
		            $albumimages->album_id=$lastid;
		            $albumimages->save();
	            }
	            else{
	            	return redirect('admin/album')->with('error', "Image not uploaded.");
	            }           
	            		            
	        }
	 
	        return redirect('admin/album')->with('status', "Image uploaded successfully.");
	    }
	}
	public function edit($id)
    {
         $alb = Album::findOrFail($id);
      return view('admin.album.edit')->with('alb', $alb);
    }
    public function update(Request $request, $id)
    {
         $this->validate($request, [
       'name'=> 'required',       
       // 'images'=> 'required',
      ]);
		// $album= new Album;
        $album=Album::findOrFail($id);
		$album->name=$request->input('name');
		$album->save();
		$lastid=$album->id;

	    if ($request->hasFile('images')) {
	 
	        foreach($request->file('images') as $file){

	        	$albumimages= new Albumimage;
	 
	            //get filename with extension
	            $filenamewithextension = $file->getClientOriginalName();
	 
	            //get filename without extension
	            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
	 
	            //get file extension
	            $extension = $file->getClientOriginalExtension();
	 
	            //filename to store
	            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
	 
	            Storage::put('public/albumimages/'. $filenametostore, fopen($file, 'r+'));
	            Storage::put('public/albumimages/thumbnail/'. $filenametostore, fopen($file, 'r+'));
	 
	            //Resize image here
	            $thumbnailpath = public_path('storage/albumimages/thumbnail/'.$filenametostore);
	            // $thumbnailpath = '/home/alrayantyping/blog/storage/app/public/albumimages/thumbnail/'.$filenametostore;
	            echo "/n/n/n<h3>Image file size is very big check image size and upload, go back and upload new image</h3>";

	            if($img = Image::make($thumbnailpath)->resize(350, 210, function($constraint) {
	                $constraint->aspectRatio(); }) )
	            {
	            	$img->save($thumbnailpath);
		            $albumimages->images=$filenametostore;
		            $albumimages->album_id=$lastid;
		            $albumimages->save();
	            }
	            else{
	            	return redirect('admin/album')->with('error', "Image not uploaded.");
	            }
	        }	 
	        
	    }
	    return redirect('admin/album')->with('status', "Image uploaded successfully.");
    }
    public function destroy($id)
    {
        Album::destroy($id);
        // Albumimage::destroy($id);
        return redirect('/admin/album')->with('success', 'Ads Has Been Deleted');
    }
}
