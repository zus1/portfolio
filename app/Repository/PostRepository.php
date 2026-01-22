<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;

class PostRepository extends BaseRepository
{
    protected const string MODEL = Post::class;

    public function findByCategory(string $category, int $recordsPerPage): Paginator
    {
        $builder = $this->getBuilder();

        return $builder->whereRelation('category', 'title', $category)
            ->simplePaginate($recordsPerPage)
            ->withQueryString();
    }
}
