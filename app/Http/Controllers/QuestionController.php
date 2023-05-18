<?php

namespace App\Http\Controllers;

use Validator;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Answer;
use App\Models\CategoryName;
use App\Models\Category;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::all();
 
        return view('question.index', ['question' => $question]);
    }

    public function create()
    {
        $category_name = CategoryName::all();
    
        return view('question.create', ['category_name' => $category_name]);
    }

    public function store(Request $request)
    {
        //validate
        $request->validate([
            'question' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:10048',
            'category' => 'required'
        ]);

        if ($request->has('image')) {
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('image'), $imageName); 
        };
        

        if ($request->has('image')) {
            $question = Question::create([
                'question' => $request->input('question'),
                'image' => $imageName,
                'user_id' => Auth::id()
            ]);
        } else {
            $question = Question::create([
                'question' => $request->input('question'),
                'image' => "",
                'user_id' => Auth::id()
            ]);
        }

        Category::create([
            'question_id' => $question->id,
            'category_name_id' => $request->category
        ]);

        Alert::success('Berhasil', 'Pertanyaan Berhasil Dibuat');
        return redirect('/question');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('question.show', compact('question'));
        
        // $question = DB::table('question')->find($id);

        // return view('question.show', ['question' => $question]);
    }

    public function edit($id)
    {
        $category_name = CategoryName::all();
        $question = Question::find($id);

        return view('question.edit', ['question' => $question, 'category_name' => $category_name]);
    }

    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'question' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:10048',
            'category' => 'required'
        ]);
        

        $question = Question::find($id);
        $category = Category::where('question_id', $id)->firstOrFail();

        
        $question->question = $request->question;

        if ($request->has('image')) {
            if ($question->image != "")  {
                $path = 'image/';
                File::delete($path. $question->image);
            }

            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('image'), $imageName); 

            $question->image = $imageName;
        };
        
        $question->user_id = Auth::id();
        $question->save();

        $category->question_id = $question->id;
        $category->category_name_id = $request->category;

        $category->save();

        Alert::success('Berhasil', 'Pertanyaan Berhasil Diedit');
        return redirect('/question');
    }

    public function destroy($id)
    {
        $question = Question::find($id);

        if ($question->image != "") {
            $path = 'image/';
            File::delete($path. $question->image);
        }
 
        $question->delete();

        Alert::success('Berhasil', 'Pertanyaan Berhasil Dihapus');
        return redirect('/question');
    }
}
