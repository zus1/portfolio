<?php

namespace App\Http\Controllers\Posts;

use App\Enums\Categories;
use App\Enums\Pagination;
use App\Repository\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Get
{
    public function __construct(
        private PostRepository $repository,
    ){
    }

    public function __invoke(Request $request, string $category)
    {
        if (Categories::tryFrom($category) === null) {
            throw new HttpException(404, sprintf('Unknown category %s', $category));
        }

        $rpp = (int) $request->input('records_page', Pagination::DEFAULT_PER_PAGE->value);

        $posts = $this->repository->findByCategory(category: $category, recordsPerPage: $rpp);

        return View::make('posts', ['posts' => $posts]);
    }
}
