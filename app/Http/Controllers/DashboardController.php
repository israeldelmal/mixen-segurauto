<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Validator;
use Auth;
use File;

use App\About;
use App\Article;
use App\Desc;
use App\Header;
use App\Payment;
use App\User;

class DashboardController extends Controller
{
	// Index
    public function index()
    {
        $count_users    = User::orderBy('id', 'DESC')->get();
        $count_articles = Article::orderBy('id', 'DESC')->get();
        $count_payments = Payment::orderBy('id', 'DESC')->get();
        $users          = User::orderBy('id', 'DESC')
                                ->limit(5)
                                ->get();
        $articles       = Article::orderBy('id', 'DESC')
                                ->limit(5)
                                ->get();
        $payments       = Payment::orderBy('id', 'DESC')
                                ->limit(5)
                                ->get();
    	return view('dashboard.index.index')
                ->with('count_users', $count_users)
                ->with('count_articles', $count_articles)
                ->with('count_payments', $count_payments)
                ->with('users', $users)
                ->with('articles', $articles)
                ->with('payments', $payments);
    }

    // Usuarios
    public function users()
    {
    	$users = User::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.users.index')
    			->with('users', $users);
    }

    public function users_edit($id)
    {
    	$user = User::find($id);
    	return view('dashboard.users.edit')
    			->with('user', $user);
    }

    // Usuario
    public function user($id)
    {
        $user = User::find($id);
        return view('dashboard.users.user')
                ->with('user', $user);
    }

    public function user_update(Request $request, $id)
    {
        $rules = [
            'name'     => 'required|min:4',
            'lastname' => 'required|min:4',
        ];

        $messages = [            
            'name.required'     => 'Este campo es requerido',
            'name.min'          => 'Mínimo 4 caracteres',
            
            'lastname.required' => 'Este campo es requerido',
            'lastname.min'      => 'Mínimo 4 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $user           = User::find($id);
            $user->name     = $request->name;
            $user->lastname = $request->lastname;
            $user->save();

            return redirect()->back();
        }
    }

    // Home
    public function header()
    {
        $header = Header::find('1');
        return view('dashboard.home.header')
                ->with('header', $header);
    }

    public function header_update(Request $request, $id)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es necesario',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 5MB',
            'img.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $headers      = Header::find($id);
            $headers->h1  = $request->h1;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/cabecera/' . $headers->img);

                $image = $request->file('img');
                $name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/cabecera/';
                $image->move($path, $name);

                $headers->img = $name;
            }

            $headers->save();

            return redirect()->back();
        }
    }

    // Nosotros
    public function about()
    {
        $about = About::find('1');
        return view('dashboard.home.about')
                ->with('about', $about);
    }

    public function about_update(Request $request)
    {
        $rules = [
            'content' => 'required|min:4'
        ];

        $messages = [            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $about          = About::find('1');
            $about->content = html_entity_decode($request->content);
            $about->save();

            return redirect()->back();
        }
    }

    public function break()
    {
        $break = Desc::find('1');
        return view('dashboard.home.break')
                ->with('break', $break);
    }

    public function break_update(Request $request, $id)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es necesario',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 5MB',
            'img.dimensions' => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $break      = Desc::find($id);
            $break->h1  = $request->h1;

            if ($request->hasFile('img')) {
                File::delete(public_path() . '/assets/images/descanso-1/' . $break->img);

                $image = $request->file('img');
                $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/descanso-1/';
                $image->move($path, $name);

                $break->img = $name;
            }

            $break->save();

            return redirect()->back();
        }
    }

    // Artículos
    public function articles()
    {
    	$articles = Article::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.articles.index')
    			->with('articles', $articles);
    }

    public function articles_create()
    {
    	return view('dashboard.articles.create');
    }

    public function articles_store(Request $request)
    {
    	$rules = [
            'title'   => 'required|min:4|unique:articles',
            'content' => 'required|min:4',
            'img'   => 'required|mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
			'title.required'   => 'Este campo es necesario',
			'title.min'        => 'Mínimo 4 caracteres',
			'title.unique'     => 'Ya existe este título, prueba otro',
			
			'content.required' => 'Este campo es necesario',
			'content.min'      => 'Mínimo 4 caracteres',
			
			'img.required'     => 'Este campo es necesario',
			'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
			'img.max'          => 'Peso máximo de 5MB',
			'img.dimensions'   => 'Las medidas son de 1920x1080',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $image = $request->file('img');
            $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/articulos/';
            $image->move($path, $name);

			$article          = new Article($request->all());
			$article->title   = $request->title;
			$article->slug    = str_slug($request->title);
			$article->content = html_entity_decode($request->content);
			$article->img     = $name;
			$article->user_id = Auth::user()->id;
            $article->save();

            return redirect('/escritorio/articulos');
        }
    }

    public function articles_edit($id)
    {
    	$article = Article::find($id);
    	return view('dashboard.articles.edit')
    			->with('article', $article);
    }

    public function articles_update(Request $request, $id)
    {
        $rules = [
            'title'   => 'required|min:4',
            'content' => 'required|min:4',
            'image'   => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'status'  => 'required',
        ];

        $messages = [            
            'title.required'   => 'Este campo es necesario',
            'title.min'        => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',

            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080',
            
            'status.required'  => 'Este campo es necesario',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $article        = Article::find($id);
            $article->title = $request->title;
            $article->slug  = str_slug($request->title);

            if ($request->hasFile('image')) {
                File::delete(public_path() . '/assets/images/articulos/' . $article->image);

                $image = $request->file('image');
                $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
                $path  = public_path() . '/assets/images/articulos/';
                $image->move($path, $name);

                $article->image = $name;
            }

            $article->content = html_entity_decode($request->content);
            $article->status  = $request->status;
            $article->save();

            return redirect('/escritorio/articulos');
        }
    }

    // Métodos
    public function payments()
    {
        $payments = Payment::orderBy('id', 'DESC')->simplePaginate(10);
        return view('dashboard.payments.index')
                ->with('payments', $payments);
    }

    public function payments_create()
    {
        return view('dashboard.payments.create');
    }

    public function payments_store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4'
        ];

        $messages = [            
            'name.required' => 'Este campo es necesario',
            'name.min'      => 'Mínimo 4 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $payment          = new Payment($request->all());
            $payment->name    = $request->name;
            $payment->user_id = Auth::user()->id;
            $payment->save();

            return redirect('/escritorio/metodos');
        }
    }

    public function payments_edit($id)
    {
        $payment = Payment::find($id);
        return view('dashboard.payments.edit')
                ->with('payment', $payment);
    }

    public function payments_update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:4'
        ];

        $messages = [            
            'name.required' => 'Este campo es necesario',
            'name.min'      => 'Mínimo 4 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        } elseif ($validator->passes()) {
            $payment       = Payment::find($id);
            $article->name = $request->name;
            $article->save();

            return redirect('/escritorio/metodos');
        }
    }
}
