<?php
  
namespace App\Http\Livewire;
  
use Livewire\Component;
use App\Models\Post;
  
class Posts extends Component
{
    public $posts, $name, $email, $course, $post_id;
    public $updateMode = false;

    protected $listeners = [
        'deletePost'=>'destroy'
    ];
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->email = '';
        $this->course = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:posts,email',
            'course' => 'required',
        ]);
  
        Post::create($validatedDate);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->name = $post->name;
        $this->email = $post->email;
        $this->course = $post->course;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:posts,email',
            'course' => 'required'
        ]);
  
        $post = Post::find($this->post_id);
        $post->update([
            'name' => $this->name,
            'email' => $this->email,
            'course' => $this->course,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function destroy($id){
        
            Post::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        
    }
}