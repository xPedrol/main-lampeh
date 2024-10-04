<?php

namespace App\Http\Controllers;


use App\Jobs\SendEmailJob;
use App\Models\Informative;
use App\Models\InformativeComment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Controller
{

    public function home()
    {
        $informatives = Informative::orderBy('created_at', 'desc')->orderBy('title', 'asc')->limit(7)->get();
        return view('home', ['informatives' => $informatives]);
    }

    public function login(Request $request)
    {
        $params = $request->query();
        return view('login', ['redirect' => $params['redirect'] ?? null]);

    }

    public function logging(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $redirectUrl = $request['redirect'] ?? null;
        $email = $request['email'];
        $password = $request['password'];
        $user = User::where('email', $email)->first();
        if ($user && $user["active"] != 1) {
            return redirect()->route('login')->with('error', 'Email não confirmado');
        }
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            if ($redirectUrl) {
                return redirect($redirectUrl);
            }
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('error', 'Email ou senha incorretos');
    }

    public function register()
    {
        return view('register');
    }

    public function registering(Request $request)
    {
        if($request->get('trap')) return redirect()->route('home');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
            'name' => 'required',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = config('services.recaptcha.secret');
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $URL = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($URL);
                $response = json_decode($response);
                if (!$response->success || $response->score <=  config('services.recaptcha.score')) {
                    $fail($attribute.'reCAPTCHA inválido');
                }
            }
        ]);
        if ($request['password'] !== $request['confirmPassword']) {
            return back()->with('error', 'As senhas não conferem');
        }
        $user = new User();
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->name = $request['name'];
        $token = base64_encode(random_bytes(12)); // Gera 12 bytes de dados aleatórios e converte para uma string base64
        $token = substr($token, 0, 10); // Corta a string para 10 caracteres
        $user->token = $token;
        $user->created_at = now();
        $user->updated_at = now();
        $user->active = 0;
        $storedUser = User::where('email', $user->email)->first();
        if ($storedUser != null) {
            return back()->with('error', 'Email já cadastrado');
        }
        $res = $user->save();
        if ($res) {
//            $base_url = Config::get('app.env') === 'local' ? Config::get('app.app_url') . ":" . Config::get('app.app_port') : Config::get('app.app_url');
//            $encodedEmail = urlencode($user->email);
//            $tokenEncoded = urlencode($token);
//            $link = "$base_url/confirmar-email?email=$encodedEmail&token=$tokenEncoded";
//            $body = "Recebemos seu cadastro. Para utilizar sua conta é precisa verificar este email. Para isso, basta clicar no botão abaixo.<br/><br/>";
//            $body .= "<a href='$link' style='background-color: #212529; padding: 8px 8px; border: none; color: white; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;'>Confirmar Cadastro</a>";
//            $details = [
//                'email' => $user->email,
//                'subject' => 'Confirmação de Email',
//                'title' => "Olá, " . $user->name . ".",
//                'body' => $body
//            ];
//            dispatch(new SendEmailJob($details));
            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso! Um link de confirmação foi enviado para seu email.');
        } else {
            return back()->with('error', 'Erro ao cadastrar');
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        session_start();
        unset($_SESSION['email']);
        return redirect()->route('login');
    }

    public function forgot_password(Request $request)
    {
        return view('auth.forgotPassword');
    }

    public function estagio_voluntario(Request $request)
    {
        if ($request->method() == 'POST') {
            if($request->get('trap')) return redirect()->route('home');
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'g-recaptcha-response' => function ($attribute, $value, $fail) {
                    $secretKey = config('services.recaptcha.secret');
                    $response = $value;
                    $userIP = $_SERVER['REMOTE_ADDR'];
                    $URL = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                    $response = \file_get_contents($URL);
                    $response = json_decode($response);
                    if (!$response->success || $response->score <=  config('services.recaptcha.score')) {
                        $fail($attribute.'reCAPTCHA inválido');
                    }
                }

            ]);
            require base_path("vendor/autoload.php");
            $body = "Email: " . $request['email'] . ".<br/><br/>";
            $body .= $request['message'];
            $hostEmail = Config::get('app.mail_host');
            $details = [
                'email' => $hostEmail,
                'subject' => 'Estágio Voluntário [LAMPEH]',
                'title' => "Mensagem de " . $request['name'],
                'body' => $body
            ];
            dispatch(new SendEmailJob($details));
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
        }
        return view('estagio-voluntario');
    }

    public function projetos()
    {
        $projects = Project::orderBy('periodo', 'asc')->orderBy('title', 'asc')->get();
        return view('projetos', ['projects' => $projects]);
    }

    public function admin_informativos(Request $request)
    {
//        return now();
        if ($request->method() == 'POST') {
//            return $request['expires_at'];
            $request->validate([
                'title' => 'required'

            ]);
//            if ($request['expires_at']) {
//                $expires_at = Carbon::createFromFormat('Y-m-d\TH:i', $request['expires_at'], Config::get('app.default_timezone'))->setTimezone('UTC');
//            } else {
//                $expires_at = null;
//            }
            $informative = new Informative();
            $informative->title = $request['title'];
            $informative->message = $request['message'];
            $informative->created_at = now();
            $informative->updated_at = now();
            $res = $informative->save();
            if ($res) return redirect()->back()->with('success', 'Informativo cadastrado com sucesso!');
            return redirect()->back()->with('error', 'Erro ao cadastrar informativo.');
        }
        $informatives = Informative::orderBy('created_at', 'asc')->orderBy('title', 'asc')->get();
        return view('admin.informativos', ['informatives' => $informatives]);
    }

    public function informativo(Request $request)
    {
        if ($request->method() == 'POST') {
            if($request->get('trap')) return redirect()->route('home');
            $request->validate([
                'name' => 'required',
                'message' => 'required',
                'g-recaptcha-response' => function ($attribute, $value, $fail) {
                    $secretKey = config('services.recaptcha.secret');
                    $response = $value;
                    $userIP = $_SERVER['REMOTE_ADDR'];
                    $URL = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                    $response = \file_get_contents($URL);
                    $response = json_decode($response);
                    if (!$response->success || $response->score <=  config('services.recaptcha.score')) {
                        $fail($attribute.'reCAPTCHA inválido');
                    }
                }
            ]);
            $comment = new InformativeComment();
            $comment->name = trim($request['name']);
            $comment->message = trim($request['message']);
            $comment->informative_id = $request->route('id');
            $comment->created_at = $comment->updated_at = now();

            $res = $comment->save();
            if ($res) return redirect()->back();
            return redirect()->back()->with('error', 'Erro ao cadastrar comentário.');
        }
        $informative = Informative::find($request->route('id'));
        $comments = InformativeComment::where('informative_id', $informative->id)->get();
        return view('informativo', ['informative' => $informative, 'comments' => $comments]);
    }

    public function delete_informativo(Request $request)
    {
        $informativo_id = $request->route('id');
        if (!$informativo_id) return redirect()->back()->with('error', 'Chave inválida.');
        $res = $this->delete_informativo_comments($informativo_id);
        if ($res) {
            $res = Informative::where('id', '=', $informativo_id)->delete();
            if ($res) return redirect()->back()->with('success', 'Informativo deletado com sucesso!');
        }
        return redirect()->back()->with('error', 'Erro ao deletar  informativo.');
    }

    protected function delete_informativo_comments($informativo_id): bool
    {
        $count = InformativeComment::where('informative_id', '=', $informativo_id)->count();
        if ($count == 0) return true;
        $res = InformativeComment::where('informative_id', '=', $informativo_id)->delete();
        return $res;
    }

    public function fale_conosco(Request $request)
    {
        if($request->method() == 'GET'){
            return view('fale-conosco');
        }
        if($request->method() == 'POST'){
            if($request->get('trap')) return redirect()->route('home');
            $request->validate([
                'email' => 'required|email',
                'assunto' => 'required',
                'nome' => 'required',
                'texto' => 'required',
                'g-recaptcha-response' => function ($attribute, $value, $fail) {
                    $secretKey = config('services.recaptcha.secret');
                    $response = $value;
                    $userIP = $_SERVER['REMOTE_ADDR'];
                    $URL = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                    $response = \file_get_contents($URL);
                    $response = json_decode($response);
                    if (!$response->success || $response->score <=  config('services.recaptcha.score')) {
                        $fail($attribute.'reCAPTCHA inválido');
                    }
                }
            ]);
            $data = $request->only(['email', 'assunto', 'nome', 'texto']);
            if ($data['email'] != 'sample@email.tst') {
                $data['assunto'] = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $data['assunto']);
                require base_path("vendor/autoload.php");

                $subject = "Fale Conosco [LAMPEH]: " . $data['assunto'];
                $body = "
            <h4>E-mail enviado pelo Fale Conosco do site principal LAMPEH.</h4>

            Nome: " . $data['nome'] . "<br/>
            Email: " . $data['email'] . "<br/>
            <br/>
            Mensagem: <br/>"
                    . $data['texto'] . "
        ";
                $hostEmail = Config::get('app.mail_host');
                if ($hostEmail) {
                    $details = [
                        'bcc' => $data['email'],
                        'email' => $hostEmail,
                        'subject' => $subject,
                        'body' => $body,
                        'title' => ''
                    ];
                    dispatch(new SendEmailJob($details));
                }
                return back()->with("success", 'Mensagem enviada com sucesso!');
            }
            return back()->with("error", 'Erro ao enviar mensagem!');
        }
        return null;
    }

}
