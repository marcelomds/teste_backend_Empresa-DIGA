<?php

namespace App\Repositories\Movie;

use App\Models\Movie\Tag;

class TagRepository
{
    private Tag $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function all()
    {
        return $this->tag::all();
    }
}
