<?php

namespace Tests\Unit\Models;

use App\Models\{Post, Tag};
use Tests\TestCase;

class TagModelTest extends TestCase
{
    /**
     * Tag factory should create Tags.
     *
     * @return void
     */
    public function test_tag_factory()
    {
        $tag = Tag::factory()->create();

        $this->assertInstanceOf(Tag::class, $tag);
    }

    /**
     * Tags can be mapped to posts.
     *
     * @return void
     */
    public function test_tag_has_posts()
    {
        $post = Post::factory()->create();
        $tag = Tag::factory()
                ->hasAttached([$post])
                ->create();

        $this->assertTrue($tag->posts()->first()->is($post));
    }
}
