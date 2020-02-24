<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ArticlesRepositoryInterface
{
    public function all();

    public function users();

    public function getArticleId($id);

    public function update(Request $request, $id);

    public function getArticleByUserId();
}