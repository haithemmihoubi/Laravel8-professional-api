<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResizeImageRequest;
use App\Models\Album;
use App\Models\ImageManipulation;
use App\Http\Requests\StoreImageManipulationRequest;
use App\Http\Requests\UpdateImageManipulationRequest;
use Faker\Provider\Image;

class ImageManipulationController extends Controller
{

    public function index()
    {

    }


    public function resize(ResizeImageRequest $request)
    {
        //
    }

    public function show(ImageManipulation $imageManipulation)
    {
        //
    }


    public function update( ImageManipulation $imageManipulation)
    {
        //
    }


    public function destroy(ImageManipulation $imageManipulation)
    {
        //
    }

    public function byAlbum(Album $album)
    {
        //
    }


}
