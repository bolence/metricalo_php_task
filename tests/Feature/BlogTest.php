<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Blog;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user, $blog;

    /**
     * Set up method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = Passport::actingAs(
            User::factory()->create(),
            ['blogs']
        );
        $this->blog = Blog::factory()->create(['user_id' => $this->user->id]);
    }

    /**
     * Test if user can see all blogs
     *
     * @return void
     */
    public function test_view_all_blogs()
    {
        $response = $this->getJson('/api/blogs');

        $response->assertStatus(200);
    }

    /**
     * Test if user can see single blog
     *
     * @return void
     */
    public function test_view_single_blog()
    {

        $response = $this->getJson('/api/blogs/' . $this->blog->id);

        $response->assertStatus(200);
    }

    /**
     * Test if user can create a blog
     *
     * @return void
     */
    public function test_can_create_blog()
    {
        $response = $this->postJson('/api/blogs', $this->blog->toArray());

        $response->assertStatus(200);

        $this->assertDatabaseHas('blogs', [
            'blog_title' => $this->blog->blog_title,
            'blog_slug' => $this->blog->blog_slug,
            'blog_text' => $this->blog->blog_text
        ]);
    }


    public function test_can_update_blog()
    {

        $response = $this->putJson("/api/blogs/" . $this->blog->id, $this->blog->toArray());

        $response->assertStatus(200);
    }

    public function test_can_delete_blog()
    {
        $response = $this->deleteJson('/api/blogs/' . $this->blog->id);

        $response->assertStatus(200);
    }
}
