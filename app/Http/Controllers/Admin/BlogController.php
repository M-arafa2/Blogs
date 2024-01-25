<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Traits\TablesHelper;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\ApiJsonResponse;

class BlogController extends Controller
{
    use TablesHelper;
    use ApiJsonResponse;

    public function index(Request $request)
    {
        if($request->ajax()) {
            $blogs = Blogs::all();
            return Datatables::of($blogs)
                ->addColumn('action', function ($row) {
                    return $this->addAction(
                        $row,
                        ['id','title','image','content','created_at'],
                        false,
                        true,
                        true,
                    );
                })
                ->addColumn('image', function ($row) {return $this->addImage($row, 'image');})
                ->addColumn('content', function ($row) {return $row->content;})
                ->rawColumns(['content', 'image','action'])
                ->make();
        } else {
            return view('admin.blogs.index');
        }
    }

    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $path = $request->file('image')->store('/images/blogs', ['disk' =>   'uploads']);
        $validated['image'] = $path;
        $blog = Blogs::create($validated);
        return $this->success('Created', [], 201);
    }


    public function update(BlogRequest $request, Blogs $blog)
    {
        $validated = $request->validated();
        if($request->file('image')) {

            $path = $request->file('image')->store('/images/blogs', ['disk' =>   'uploads']);
            $validated['image'] = $path;
        }
        $blog->update($validated);
        return $this->success('Updated', [], 200);


    }


    public function destroy(Blogs $blog)
    {
        $blog->delete();
        return $this->success('Deleted', [], 200);

    }
}
