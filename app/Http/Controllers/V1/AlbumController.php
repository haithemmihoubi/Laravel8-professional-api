<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\V1\AlbumResource;
use App\Models\Album;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use function response;
/**
 * Album
 * @mixin Builder
 */
class AlbumController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return AlbumResource::collection(Album::paginate(20));
    }


    public function store(StoreAlbumRequest $request)
    {
        $album = Album::create($request->all());
        return new AlbumResource($album);
    }


    public function show(Album $album)
    {
        return new AlbumResource($album);
    }


    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update($request->all());
        return new AlbumResource($album);
    }


    public function destroy(Album $album)
    {
        $album->delete();
        return response("album  deleted successfully", 204);
    }
}
