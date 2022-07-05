<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\ParentPostChildren;
use App\Models\Post;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade;


class PostController extends Controller
{


    // Category
    public function Category_Post()
    {
        // return dd(1);
        $a = CategoryPost::first();
        return dd($a->ParentPostChildren);
    }
    public function create()
    {
        // return dd(1);
        $a = CategoryPost::first();
        return view('admin.post.category_posts.add', [
            'title' => 'Thêm danh mục mới',
            // 'menus' => $this->menuService->getParent()
        ]);
    }
    public function show_Category_Post()
    {
        $CategoryPost = CategoryPost::get();
        return view('admin.post.category_posts.list', [
            'title' => 'Danh sách danh mục bài đăng.',
            'CategoryPost' => $CategoryPost
        ]);
    }

    //Post
    public function showPost()
    {
        $CategoryPost = CategoryPost::select('id', 'category_post_name')->get();
        $category_children_post = ParentPostChildren::select('category_post_children_name', 'name_slug')->where('parent_post_children_id', 1)->get();
        // return dd($category_children_post);
        $Posts = Post::where('parent_post_children_slug', 'chinh-tri')->simplePaginate(10);
        return view('admin.post.post.list', [
            'title' => 'Danh sách bài đăng',
            'CategoryPost' => $CategoryPost,
            'category_children_post' => $category_children_post,
            'Posts' => $Posts,
        ]);
    }

    //hàm lấy ra danh sách category children 
    public function filter_category_children(Request $request)
    {
        $category_children_post = ParentPostChildren::select('category_post_children_name', 'name_slug')->where('parent_post_children_id', $request->id)->get();
        $countCategoryChildren = count($category_children_post);
        return response()->json([
            'code' => 200,
            'category_children_post' => $category_children_post,
            'countCategoryChildren' => $countCategoryChildren
        ]);
    }

    public function filterPost(Request $request)
    {
        // return dd($request->keyword);
        $Post = Post::where('parent_post_children_slug', $request->keyword)->get();
        $countPost = count($Post);
        return response()->json([
            'code' => 200,
            'Post' => $Post,
            'countPost' => $countPost,
        ]);
    }
    public function updateStatus(Request $request)
    {
        if ($request->status == 1) {
            Post::where('id', $request->id)->update([
                'status' => 2,
            ]);
        } else {
            Post::where('id', $request->id)->update([
                'status' => 1,
            ]);
        }
        return response()->json([
            'code' => 200,
            'id' => $request->id,
            'message' => 'Đổi trạng thái thành công.'
        ]);
    }
    public function deletePost(Request $request)
    {

        Post::where('id', $request->id)->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Xóa bài viết thành công.',
            'id' => $request->id
        ]);
    }
    public function publishPost_unpublishPost($status)
    {
        //status = 1 => Publish
        //status = 2 => Unpublish
        $CategoryPost = CategoryPost::select('id', 'category_post_name')->get();
        $category_children_post = ParentPostChildren::select('category_post_children_name', 'name_slug')->where('parent_post_children_id', 1)->get();

        if ($status == 1) {
            $Posts = Post::where('status', 1)->simplePaginate(10);
            $status_ = 'Publish';
        } else {
            $Posts = Post::where('status', 2)->simplePaginate(10);
            $status_ = 'Unpublish';
        }

        return view('admin.post.post.listPU_Post', [
            'title' => 'Danh sách bài đăng ' . $status_,
            'CategoryPost' => $CategoryPost,
            'category_children_post' => $category_children_post,
            'Posts' => $Posts,
        ]);
    }
    public function viewPost($id)
    {
        $Post = Post::where('id', $id)->first();
        return view('admin.post.post.view', [
            'title' => 'Chi tiết bài Post',
            'Post' => $Post,
        ]);
    }
}
