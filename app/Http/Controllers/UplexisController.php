<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class UplexisController extends Controller
{
  public function posts(Request $request)
  { 
    // $('.col.post').closest('.container')
    $validation = $request->validate([
      'search' => 'required|min:4|max:60',
    ]);
    $url  = 'http://www.uplexis.com.br/blog';
    $path = $url.'?s='.$request->search;
    $html = file_get_contents($path);
    return $html;
  }

  public function saveDataPosts(Request $request)
  { 
    $db_posts = Post::all();
    $new_posts = $request->all();

    // check new post already on db use link with param
    foreach ($new_posts as $newKey => $newPost) {
      foreach ($db_posts as $dbKey => $dbPost) {
        if ($dbPost->link === $newPost['link']) {
          unset($new_posts[$newKey]);
          continue;
        }
      }
    }
    $posts = Post::insert($new_posts); // save just new posts
    return response()->json($posts);
  }
}
