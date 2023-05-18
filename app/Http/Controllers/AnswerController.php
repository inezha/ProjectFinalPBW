<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AnswerController extends Controller
{
    public function store(Request $request, $questionid)
    {
        $request -> validate([
            'answer' => 'required',
        ]);

        Answer::create([
            'answer' => $request->input('answer'),
            'question_id' => $questionid,
            'user_id' => Auth::id()
        ]);

        Alert::success('Berhasil', 'Jawaban Berhasil Ditambahkan');
        return redirect('/question/' . $questionid);
    }

    public function destroy($id){
       
       $answer = Answer::find($id);
       $questionid = $answer->question_id;
       $answer->delete();

       Alert::success('Berhasil', 'Jawaban Berhasil Dihapus');
       return redirect('/question/' . $questionid);

    }

    //new
    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('answer.edit', compact('answer'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required',
        ]);
    
        $answer = Answer::find($id);
        $answer->answer = $request->input('answer');
        $answer->save();

        Alert::success('Berhasil', 'Jawaban Berhasil Diedit');
        return redirect('/question/' . $answer->question_id);
    }
    
    

}
