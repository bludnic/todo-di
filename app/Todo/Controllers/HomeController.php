<?php

namespace Todo\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Todo\Models\Todo;
use Todo\Services\ImageUploader;
use function Todo\Helpers\view;
use function Todo\Helpers\redirect;

class HomeController {
  public function index() {
    $todos = Todo::orderBy('created_at', 'DESC')->get();

    return view('index.twig', [
      'todos' => $todos
    ]);
  }

  public function create(Request $req) {
    // Upload image
    $imageName = '';
    if ($req->files->get('image')) {
      $imageName = ImageUploader::upload($req->files->get('image'));
    }

    // Insert todo
    Todo::create([
      'author' => $req->get('author'),
      'email' => $req->get('email'),
      'text' => $req->get('text'),
      'image' => $imageName
    ]);

    http_response_code(201);

    return new JsonResponse(['message' => 'Created']);
  }

  public function delete($id) {
    Todo::destroy($id);

    redirect('/');
  }
}
