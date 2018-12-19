<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Mail;

use App\About;
use App\Article;
use App\Desc;
use App\Header;
use App\Payment;

class WebController extends Controller
{
    public function index()
    {
        $about    = About::find('1');
        $articles = Article::orderBy('id', 'DESC')
                ->where('status', true)
                ->limit(3)
                ->get();
        $break    = Desc::find('1');
        $header   = Header::find('1');
        $payments = Payment::orderBy('id', 'ASC')
                ->where('status', true)
                ->limit(4)
                ->get();
    	return view('web.index.index')
    			->with('about', $about)
    			->with('articles', $articles)
                ->with('break', $break)
                ->with('header', $header)
    			->with('payments', $payments);
    }

    public function blog_show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('web.blog.show')
                ->with('article', $article);
    }

    public function contact(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'name'    => 'required|min:2',
                'email'   => 'email|required',
                'tel'     => 'required|min:2',
                'message' => 'required|min:2'
            ];

            $messages = [
                'name.required'    => ' Este campo es necesario',
                'name.min'         => ' Mínimo 2 caracteres',
                
                'email.required'   => ' Este campo es necesario',
                'email.email'      => ' No tiene formato de email',
                
                'tel.required'     => ' Este campo es necesario',
                'tel.min'          => ' Mínimo 2 caracteres',
                
                'message.required' => ' Este campo es necesario',
                'message.min'      => ' Mínimo 2 caracteres'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'fail'   => true,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } elseif ($validator->passes()) {                
     //            $data = [
                    // 'name'    => $request->name,
                    // 'company' => $request->company,
                    // 'email'   => $request->email,
                    // 'tel'     => $request->tel,
                    // 'message' => $request->message
     //            ];

     //            Mail::send('emails.contact', $data, function($message) use ($data) {
     //                $message->to('correo@jeffco.com.mx', 'Carlos Jeffery')->subject($data['name'] . ' contactó');
     //                $message->from('notificaciones@jeffco.com.mx', 'Notificaciones JeffCo');
     //            });

                return response()->json([
                    'send' => true
                ]);
            }
        }
    }
}
