<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateImageRequest;
use App\Image;


class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();

        return view('/images/index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImageRequest $request)
    {
        $imagesImage = new Image([
            'image_name'        =>$request->get('image_name'),
            'image_extension'   =>$request->file('image')->getClientOriginalExtension(),
            'mobile_image_name' =>$request->get('mobile_image_name'),
            'mobile_extension'  =>$request->file('mobile_image')->getClientOriginalExtension(),
            'is_active'         =>$request->get('is_active'),
            'is_featured'       =>$request->get('is_featured')
            ]);

        $destinationFolder='/imgs/images/';
        $destinationThumbnail='/imgs/images/thumbnails/';
        $destinationMobile='/imgs/images/mobile/';

        $imagesImage->image_path = $destinationFolder;
        $imagesImage->mobile_image_path = $destinationMobile;

        $this->formatCheckboxValue($imagesImage);
        
        $imagesImage->save();



        $file = Input::file('image');

        $imageName = $imagesImage->image_name.'.';

        $extension = $request->file('image')->getClientOriginalExtension();

        // $image = Image::make($file->getRealPath());
        // $image->save(public_path().$destinationFolder.$imageName.'.'.$extension)->resize(10,10);

        // $extension = $file->getClientOriginalExtension();

        $file->move('imgs'.'/'.'images', $imageName.$extension);

        // $image->file = 'imgs'.'/'.$imageName.$extension;

        // $image->save();


        // $thumbFile;
        // $thumbImageName = $request->file('image')->getClientOriginalName();
        // $file->move('imgs'.'/'.'images'.'/'.'thumbnails', $thumbImageName);


        $mobileFile= Input::file('mobile_image');

        $mobileImageName = $imagesImage->mobile_image_name.'.';

        $mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

        // $mobileImage = Image::make($mobileFile->getRealPath());
        // $mobileImage->save(public_path().$destinationMobile.$mobileImageName.'.'.$mobileExtension);

        $mobileFile->move('imgs'.'/'.'images'.'/'.'mobile', $mobileImageName.$mobileExtension);

        // $image->file = 'imgs'.'/'.$imageName.$extension;

        // $image->save();

        return redirect()->route('imageShow', [$imagesImage]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagesImage = Image::findOrFail($id);

        return view('images.show', compact('imagesImage'));
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
