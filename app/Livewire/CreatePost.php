<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{
    public $title = ''; #接收user input的變數
    public $content = ''; #接收user input的變數
    public function save()
    
    {
        Post::create([ #這裡Post是剛剛定義好的Model，拿來用！
            'title' => $this->title, #user input儲存到指定欄位
            'content' => $this->content #user input儲存到指定欄位
        ]);

        return redirect()->to('/'); #完成後回到root route
        
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}