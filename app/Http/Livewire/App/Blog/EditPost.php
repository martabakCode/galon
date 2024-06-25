<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogPostTag;
use App\Models\BlogTag;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Str;


class EditPost extends Component
{
    use WithFileUploads;
    public $image;
    public $removeImage = false;
    public $title_en;
    public $title_id;
    public $excerpt_en;
    public $excerpt_id;
    public $content_en = '';
    public $post_content_en;
    public $content_id = '';
    public $post_content_id;
    public $sort;
    public $reads;
    public $time_read;
    public $enabled = 1;
    public $readOnly;
    public $categories;
    public $category;
    public $category_id;
    public $tags = [];
    public $updateTags = true;

    protected $rules = [
        'title_en' => 'required',
        'title_id' => 'required',
        'content_en' => 'required',
        'category_id' => 'required',
    ];
    public function mount($id)
    {
        $this->item_id = $id;
    }
    public function render()
    {
        $this->categories = BlogCategory::where('enabled', 1)->orderBy('sort')->get();
        $this->post = Blog::findOrFail($this->item_id);
        //dd($this->post->tags);

        $this->fillFields();
        return view('livewire.app.blog.edit-post');
    }

    public function fillFields()
    {
        $post = $this->post;
        $this->item_id = $post->id;
        // if ($this->fillImages)
        //     $this->old_images = $product->media();
        //dd($this->old_images);
        $this->title_en = $post->getTranslation('title', 'en');
        $this->title_id = $post->getTranslation('title', 'id');
        $this->excerpt_en = $post->excerpt_en;
        $this->excerpt_id = $post->excerpt_id;
        $this->content_en = $post->content_en;
        $this->content_id = $post->content_id;
        $this->category_id = $post->category_id;
        $this->thumbnail = $post->thumbnail;
        $this->enabled = $post->enabled;
        if (!$this->removeImage)
            $this->image = $post->image();
        if ($this->updateTags) {
            $tags = [];
            foreach ($post->tags as $tag)
                $tags[] = $tag->name;
            $this->tags = $tags;
            $this->updateTags = false;
        }
        //dd($this->tags);
    }

    public function update()
    {

        $this->validate();
        if (!is_string($this->image))
            $this->validate([
                'image' => 'mimes:jpg,png,jpeg,gif,svg|max:6000',
            ]);
        $this->time_read = $this->wpm($this->content_en); // 0.1 * 1000; //t(X)=0.1*X , x=character
        $title['en'] = $this->title_en;
        $title['id'] = $this->title_id;
        $path = $this->post->thumbnail;
        if ($this->image && !is_string($this->image)) {
            $file_info = $this->image->getClientOriginalName();
            $file_name = pathinfo($file_info, PATHINFO_FILENAME);
            $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
            $file_name =  Str::slug($this->title_en, '-') . '.' . $file_extension;
            $path = $this->image->storeAs('blog', $file_name, 'public');
        }
        $data = [
            'title' => $title,
            'excerpt_en' => $this->excerpt_en,
            'excerpt_id' => $this->excerpt_id,
            'content_en' => $this->post_content_en ?? $this->content_en,
            'content_id' => $this->post_content_id ?? $this->content_id,
            'category_id' => $this->category_id,
            'thumbnail' => $path,
            'time_read' => $this->time_read,
            'enabled' => $this->enabled
        ];
        $this->post->update($data);
        $this->image = '';
        $this->createTags($this->post);
        $this->removeTagsFromPost();
        //return back()->with('success', 'Product updated successfully');
        return redirect()->route('blog.posts')->with('success', 'Post created successfully');;
    }

    public function removePreview()
    {
        $this->image = '';
        $this->removeImage = true;
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
        //remove tags from post if tag removed
        $this->removeTagsFromPost();

        foreach ($this->tags as $tag) {
            $myTag = BlogTag::where('name->en', '=', $tag)->orWhere('name->ar', '=', $tag)->first();
            if (!$myTag) {
                $name['en'] = $tag;
                $name['id'] = $tag;
                $myTag = BlogTag::Create(['name' => $name]);
            }
            $bpTag = BlogPostTag::where('post_id', $post->id)->where('tag_id', $myTag->id)->first();
            if (!$bpTag)
                BlogPostTag::create(['post_id' => $post->id, 'tag_id' => $myTag->id]);
        }
    }

    public function removeTagsFromPost()
    {
        $pTags = [];
        foreach ($this->post->tags as $tag)
            $pTags[] = $tag->name;
        $newTags = $this->tags;
        //tags array has the tags removed from current post
        $tags = array_diff($pTags, $newTags);
        foreach ($tags as $tag) {
            $myTag = BlogTag::where('name->en', '=', $tag)->orWhere('name->ar', '=', $tag)->first();
            if ($myTag)
                BlogPostTag::where('post_id', $this->post->id)->where('tag_id', $myTag->id)->delete();
        }
    }
}
