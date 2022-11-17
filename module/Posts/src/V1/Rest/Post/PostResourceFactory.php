<?php
namespace Posts\V1\Rest\Post;

use StatusLib\Mapper;

class PostResourceFactory
{
    public function __invoke($services)
    {
        return new PostResource($services->get(Mapper::class));
    }
}
