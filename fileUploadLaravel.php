<?php 
	/*
		File upload in laravel 5.2
		this code is used to upload images in the controller
		insert use File; at the top of the file
		then insert the reset of the code in the conroller
	*/
	use Illuminate\Http\Request;
	use File; // goes at the top of the file

	// 
	public function ulpoad (Request $request)
	{
		if ($request->hasFile('fileToUpload')) {
	        $ext =  $request->file('fileToUpload')->getClientOriginalExtension();
	    
	        if ( $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ) {
	            $user = Auth::user();  
	            if ($user->image_path) {
	                File::delete($user->image_path);
	            } 
	            
	            $path = $request->file('fileToUpload')->move('uploads/user/', time().'_'.$request->file('fileToUpload')->getClientOriginalName());
	            
	            $user->image_path = $path;

	            $user->save();                
	            return back();
	        }else{
	            
	            $request->session()->flash('failed', 'file is not an image');
	            return back();
	            
	        }
	    }
	}



 ?>