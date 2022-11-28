<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ArtistNameRequest;
use App\Http\Requests\ArtistIdRequest;
use App\Http\Requests\AlbumIdRequest;
use App\Http\Requests\TrackNameRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

//SpotifyAPIで必要な部分
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    "dd03c6a0b9b04cbb8710efe538535e51",
    "3c12260a232c4415a0650922d4c9276f"
);
$api = new SpotifyWebAPI\SpotifyWebAPI();
$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();
$api->setAccessToken($accessToken);


class CommentController extends Controller
{
    public function index(Comment $comment)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view("comments/index")->with(["comments" => $comment->getPaginateByLimit()]);
    }
    public function show(Comment $comment)
    {
        return view("comments/show")->with(["comment" => $comment]);
    }
    public function create(Category $category)
    {
        return view("comments/create") -> with(["categories" => $category ->get()]);
    }
    public function store(CommentRequest $request, Comment $comment)
    {
        $input = $request["comment"];
        // user_idとgoodを入れてあげる
        $input["user_id"] = Auth::user()->name;
        $input["good"] = 0;
        //dd($input);
        $comment->fill($input)->save();
        return redirect("/comments/" . $comment->id);
    }
    public function edit(Comment $comment)
    {
        return view("comments/edit") -> with(["comment" => $comment]);
    }
    public function update(CommentRequest $request, Comment $comment)
    {
        $input_comment = $request["comment"];
        $comment->fill($input_comment)->save();
        
        return redirect("/comments/" . $comment->id);
    }
    public function delete(Comment $comment)
    {
        $comment -> delete();
        return redirect("/");
    }
    
    public function searchArtist()
    {
        return view("musics/searchArtist");
    }
    public function getArtists(ArtistNameRequest $request_artist_name)
    {
        // 検索ボックスに入力された値を取得
        $input_artist_name = $request_artist_name["artist_name"];
        // // apiで該当アーティストを全件取得
        $results = $api->search($input_artist_name, 'artist');
        // returnでアーティスト一覧へ遷移
        return view("musics/selectArtist");
    }
    public function getAlbums(ArtistIdRequest $request_artist_id)
    {
        // アーティストIDを取得
        $artist_id = $request_artist_id["artist_id"];
        // アーティストIDを基にアルバムを全件取得・表示(ペジネーション付ける)
        $albums = $api->getArtistAlbums($artist_id);
        // returnでアルバム一覧へ遷移
        return view("musics/selectAlbum");
    }
    public function getTracks(AlbumIdRequest $request_album_id)
    {
        // アルバムIDを取得
        $album_id = $request_album_id["album_id"];
        // アルバムIDを基にトラックを全件取得・表示
        $tracks = $api->getAlbumTracks($album_id);
        // returnでトラック一覧へ遷移
        return view("musics/selectTrack");
    }
    public function getTrack(TrackNameRequest $request_track_name)
    {
        // トラック名を取得
        $track_name = $request_track_name["track_name"];
        // returnで"/comments/create"へ遷移
        return view("comments/create");
    }
}
