<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ApiArticleControllerRepositoriesInterface
{
    public function all();

    public function getArticleById($id);

    public function getArticlesByUserId($id);

    public function store(Request $request);

    public function destroy($id);
}