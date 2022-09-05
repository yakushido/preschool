<?php

namespace Tests\Feature\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Teacher;
use App\Models\Blog;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_ブログの投稿ができる()
    {
        $user = Teacher::factory()->create();

        $blog = [
            'title' => 'test_title',
            'content' => 'test_content',
            'img_path' => UploadedFile::fake()->image('test.jpg')
        ];

        $this->actingAs($user,'teachers')->post('/teacher/blog/add', $blog);

        $read_blog = Blog::where('title','test_title')->first();
        $this->assertNotNull($read_blog);

        Storage::disk('public')->delete($read_blog->img_path);
    }
}
