<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogPostTag;
use App\Models\BlogTag;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Str;


class AddPost extends Component
{
    use WithFileUploads;
    public $image;
    public $post_tags;
    public $p_tags;
    public $title_en;
    public $title_id;
    public $excerpt_en;
    public $excerpt_id;
    public $content_en = '';
    public $content_id = '';
    public $sort;
    public $reads;
    public $time_read;
    public $enabled = 1;
    public $readOnly;
    public $categories;
    public $category;
    public $category_id;
    public $tags = []; //["Allah", "Akbar"];

    protected $rules = [
        'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:6000',
        'title_en' => 'required',
        'title_id' => 'required',
        'content_en' => 'required',
        'category_id' => 'required',
    ];
    public function render()
    {
        $this->categories = BlogCategory::where('enabled', 1)->orderBy('sort')->get();
        return view('livewire.app.blog.add-post');
    }


    public function save()
    {
        $this->validate();
        $this->time_read = $this->wpm($this->content_en); // 0.1 * 1000; //t(X)=0.1*X , x=character
        $title['en'] = $this->title_en;
        $title['id'] = $this->title_id;
        $path = '';
        if ($this->image) {
            $file_info = $this->image->getClientOriginalName();
            $file_name = pathinfo($file_info, PATHINFO_FILENAME);
            $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
            $file_name =  Str::slug($this->title_en, '-') . '.' . $file_extension;
            $path = $this->image->storeAs('blog', $file_name, 'public');
        }
        $post = Blog::create([
            'title' => $title,
            'excerpt_en' => $this->excerpt_en,
            'excerpt_id' => $this->excerpt_id,
            'content_en' => $this->content_en,
            'content_id' => $this->content_id,
            'category_id' => $this->category_id,
            'thumbnail' => $path,
            'reads' => 0,
            'time_read' => $this->time_read,
            'enabled' => $this->enabled
        ]);

        $this->image = '';

        $this->createTags($post);

        //return back()->with('success', 'Product updated successfully');
        return redirect()->route('blog.posts')->with('success', 'Post created successfully');;
    }

    public function removePreview()
    {
        $this->image = '';
    }

    public function wpm($content)
    {
        //     def getWaitTime(self, text):
        // ''' Calculate the amount of time needed to read the notification '''

        $wpm = 180;  # readable words per minute
        $word_length = 5;  # standardized number of chars in calculable word
        $words = strlen($content) / $word_length;
        $words_time = (($words / $wpm) * 60) * 1000;

        $delay = 1500;  # milliseconds before user starts reading the notification
        $bonus = 1000;  # extra time

        return round(($delay + $words_time + $bonus) / 1000 / 60, 2);
    }

    public function createTags($post)
    {
        $this->tags = array_unique($this->tags);
        $this->tags = array_map('strtolower', $this->tags);

        // dd($this->tags);
        foreach ($this->tags as $tag) {
            // $s = str_replace("\\", "\\\\", json_encode($tag));
            // $s = str_replace("\"", "", $s);
            $myTag = BlogTag::where('name->en', '=', $tag)->orWhere('name->ar', '=', $tag)->first();
            if (!$myTag) {
                $name['en'] = $tag;
                $name['id'] = $tag;
                $myTag = BlogTag::Create(['name' => $name]);
            }
            BlogPostTag::create(['post_id' => $post->id, 'tag_id' => $myTag->id]);
        }
    }
}
