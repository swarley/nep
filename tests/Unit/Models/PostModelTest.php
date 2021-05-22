<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Tests\TestCase;

class PostModelTest extends TestCase
{
    /**
     * A Post can be constructed through a factory.
     *
     * @return void
     */
    public function test_post_factory()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(Post::class, $post);
    }

    /**
     * Posts should have an associated user that uploaded it.
     *
     * @return void
     */
    public function test_post_has_author()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->author);
    }

    /**
     * Posts should be able to attach tags.
     *
     * @return void
     */
    public function test_post_has_tags()
    {
        $tag = Tag::factory()->create();

        $post = Post::factory()
                  ->hasAttached([$tag])
                  ->create();

        $this->assertTrue($post->tags()->first()->is($tag));

    }
}
