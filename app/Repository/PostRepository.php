<?php

namespace App\Repository;

use App\Enums\Pagination;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;

class PostRepository extends BaseRepository
{
    protected const string MODEL = Post::class;

    public function findByCategory(string $category, ?int $recordsPerPage = Pagination::DEFAULT_PER_PAGE->value): Paginator
    {
        $builder = $this->getBuilder();

        return $builder->whereRelation('category', 'title', $category)
            ->where('active', true)
            ->paginate($recordsPerPage)
            ->withQueryString();
    }
}
