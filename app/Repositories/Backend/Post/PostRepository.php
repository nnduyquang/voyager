<?php

namespace App\Repositories\Backend\Post;

use App\Category;
use App\Product;
use App\Repositories\EloquentRepository;
use App\Seo;
use Illuminate\Support\Facades\Auth;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return \App\Post::class;
    }

    public function getAllPostOrderById()
    {
        return $this->_model::where('post_type', '=', IS_POST)->orderBy('id', 'DESC')->get();
    }
    
    public function showCreatePost()
    {
        $data=[];
        $category=new CategoryItem();
        $product=new Product();
        $dd_categorie_posts = $category->getArrayCategory('create');
        $data['dd_categorie_posts']=$dd_categorie_posts;
        $products=$product->getAllProductActiveOrderById();
        $data['products']=$products;

        return $data;
    }

    public function showEditPost($id)
    {
        $data=[];
        $category=new Category();
        $product=new Product();
        $dd_categorie_posts = $category->getArrayCategory('edit');
        $data['dd_categorie_posts']=$dd_categorie_posts;
        $products=$product->getAllProductActiveOrderById();
        $data['products']=$products;
        $post=$this->find($id);
        $data['post']=$post;
        return $data;
    }


    public function createNewPostWithSeoId($request)
    {
        $seo = Seo::create($request->all());
        if(!$request->has('isActive'))
            $request->request->add(['isActive' => null]);
        $request->request->add(['seo_id' => $seo->id]);
        $request->request->add(['post_type' => IS_POST]);
        $request->request->add(['path' => '']);
        $request->request->add(['user_id' => Auth::user()->id]);
        $post = $this->create($request->all());
        $post->products()->attach($request->input('list_id'));
        return true;
    }

    public function updateNewPost($request,$id)
    {
        if(!$request->has('isActive'))
            $request->request->add(['isActive' => null]);
        $request->request->add(['path' => '']);
        $post=$this->update($id,$request->all());
        $post->products()->sync($request->input('list_id'));
        $post->seos->update($request->all());
        return true;
    }

    public function deletePost($id){
        $this->delete($id);
        return true;
    }


}