<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ArtistNameRequest;
use App\Http\Requests\ArtistIdRequest;
use App\Http\Requests\AlbumIdRequest;
use App\Http\Requests\TrackNameRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use SpotifyWebAPI;
use App\Models\Good;

//SpotifyAPIで必要な部分
require '../vendor/autoload.php';


class CommentController extends Controller
{
    public function spotify()
    {
        $session = new SpotifyWebAPI\Session(
            "dd03c6a0b9b04cbb8710efe538535e51",
            "3c12260a232c4415a0650922d4c9276f"
        );
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();
        $api->setAccessToken($accessToken);
        return $api;
    }
    // 楽曲へのコメント関連
    public function index(Comment $comment)//インポートしたCommentをインスタンス化して$commentとして使用。
    {
        return view("comments/index")->with(["comments" => $comment->getPaginateByLimit()]);
    }
    public function show(Comment $comment, Reply $reply)
    {   
        return view("comments/show")->with(["comment" => $comment, "replies" => $reply->get()]);
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
    
    // いいね機能関連
    public function good($id)
    {
        Good::create([
            "comment_id" => $id,
            "user_id" => Auth::id()
        ]);
        session() -> flash("success", "You pushed 'Good'.");
        return redirect()->back();
    }
    public function deletegood($id)
    {
        $like = Good::where("comment_id", $id) -> where("user_id", Auth::id())->first();
        $like -> delete();
        
        session() -> flash("success", "You deleted 'Good'.");
        return redirect()->back();
    }
    public function goodpeople($id)
    {
        $like = \DB::table('goods')->where("comment_id", $id)->get(); // 中間テーブルからユーザーのidを取得
        return view("comments/goodpeople")->with(["goods" => $like]);
    }
    
    // 楽曲検索関連
    public function getMusicInfomation() // 楽曲詳細情報取得
    {
        $track_id = $request_track["track_id"];
        $track = $this -> spotify() ->getTrack($track_id);
        return view("musics/infomation") -> with([]);
    }
    public function searchArtist() // アーティスト検索
    {
        return view("musics/searchArtist");
    }
    public function getArtists(ArtistNameRequest $request_artist_name) // アーティスト取得
    {
        // 検索ボックスに入力された値を取得
        $input_artist_name = $request_artist_name["artist_name"];
        // // apiで該当アーティストを全件取得
        $results = $this->spotify()->search($input_artist_name, 'artist');
        // dd($results);
        // returnでアーティスト一覧へ遷移
        return view("musics/selectArtist") -> with(["results" => $results]);
    }
    public function getAlbums(ArtistIdRequest $request_artist_id) // アルバム取得
    {
        // アーティストIDを取得
        $artist_id = $request_artist_id["artist_id"];
        $artist_genre = $request_artist_id["artist_genres"];
        // アーティストIDを基にアルバムを全件取得・表示(ペジネーション付ける)
        $albums = $this->spotify()->getArtistAlbums($artist_id);
        // dd($albums);
        // returnでアルバム一覧へ遷移
        return view("musics/selectAlbum") -> with(["albums" => $albums, "genre" => $artist_genre]);
    }
    public function getTracks(AlbumIdRequest $request_album_id) // 楽曲取得
    {
        // アルバムIDを取得
        $album_id = $request_album_id["album_id"];
        // アルバムIDを基にトラックを全件取得・表示
        $tracks = $this->spotify()->getAlbumTracks($album_id);
        // dd($tracks);
        $artist_genre = $request_album_id["artist_genre"];
        // returnでトラック一覧へ遷移
        return view("musics/selectTrack") -> with(["tracks" => $tracks, "genre" => $artist_genre]);
    }
    public function getTrack(TrackNameRequest $request_track_name, Category $category) // 楽曲選択
    {
        // トラック名を取得
        $track_name = $request_track_name["track_name"];
        $artist_genre = $request_track_name["artist_genre"];
        // returnで"/comments/create"へ遷移
        return view("comments/create")->with(["categories" => $category ->get(), "track_name" => $track_name, "genre" => $artist_genre]);
    }
    
    // // リプライ機能関連
    // public function getreplies($id)
    // {
    //     $replies = Reply::with(["user", "second_replies", "secondreplies.user"]) -> where("replies.comment_id", $id) -> get();
        
    //     return view("/comments");
    // }
}
