<?php

namespace App\Http\Livewire\App\Blog;

use App\Models\Blog;
use Livewire\Component;

class Posts extends Component
{
    public $posts;
    public $post;
    public $enabled;
    public $item_id;
    public $readOnly = false;
    public $isDeleteOpen = false;
    public $search;

    public function render()
    {
        $this->posts = Blog::get();
        return view('livewire.app.blog.posts');
    }

    public function resetFields()
    {
        $this->enabled = 1;
        $this->sort = 0;
        $this->item_id = '';
        $this->post = '';
        $this->isDeleteOpen = false;
    }

    public function enabled($id)
    {
        $this->enabled = !$this->enabled;
        $post = Blog::findOrFail($id);
        $post->enabled = !$post->enabled;
        $post->update();
    }
    public function deleteId($id)
    {
        $this->item_id = $id;
        $this->post = Blog::findOrFail($id);
        $this->openDeleteModal();
    }
    public function delete()
    {
        Blog::findOrFail($this->item_id)->delete();
        $this->resetFields();
    }

    public function openDeleteModal()
    {
        $this->isDeleteOpen = true;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteOpen = false;
    }
}