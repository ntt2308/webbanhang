<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestArticle;
use App\Models\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);
        $viewData = [
            'articles' => $articles
        ];
        return view('admin::article.index', $viewData);
    }
    public function create()
    {
        return view('admin::article.create');
    }
    public function store(RequestArticle $requestArticle)
    {
        $this->insertOrUpdate($requestArticle);

        return redirect()->route('admin.get.list.article')->with('success', 'Thêm mới thành công');
    }
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin::article.create', compact('article'));
    }
    public function update(RequestArticle $requestArticle, $id)
    {
        $this->insertOrUpdate($requestArticle, $id);
        return redirect()->route('admin.get.list.article')->with('success', 'Chỉnh sửa thành công');
    }
    public function insertOrUpdate($requestArticle, $id = '')
    {
        $article = new Article();

        if ($id) $article = Article::find($id);
        $article->a_name = $requestArticle->a_name;
        $article->a_slug = str_slug($requestArticle->a_name);
        $article->a_description = ($requestArticle->a_description);
        $article->a_content = $requestArticle->a_content;
        // $article->a_description_seo =  $requestArticle->a_description_seo ? $requestArticle->a_description_seo : $requestArticle->a_description_seo;
        $article->a_avatar =  $requestArticle->a_avatar ? $requestArticle->a_avatar : $requestArticle->a_avatar;

        $article->save();
    }
    public function action($action, $id)
    {
        if ($action) {
            $article = Article::find($id);
            switch ($action) {
                case 'delete':
                    $article->delete();
                    break;
                case 'active':
                    $article->a_active = $article->a_active ? 0 : 1;
                    $article->save();
                    break;
                    //  case 'hot':
                    //     $article->pro_hot = $article->pro_hot ? 0 : 1;
                    //     break;
            }
        }
        return redirect()->back();
    }
}
