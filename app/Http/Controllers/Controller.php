<?php

namespace App\Http\Controllers;


use App\Jobs\SendEmailJob;
use App\Models\Informative;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Controller
{
    public function login(Request $request)
    {
        $params = $request->query();
        return view('login', ['redirect' => $params['redirect'] ?? null]);

    }

    public function logging(Request $request)
    {
        $validated = $request->validate([
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
        $registerValidated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
            'name' => 'required'

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
            $base_url = Config::get('app.env') === 'local' ? Config::get('app.app_url') . ":" . Config::get('app.app_port') : Config::get('app.app_url');
            $encodedEmail = urlencode($user->email);
            $tokenEncoded = urlencode($token);
            $link = "$base_url/confirmar-email?email=$encodedEmail&token=$tokenEncoded";
            $body = "Recebemos seu cadastro. Para utilizar sua conta é precisa verificar este email. Para isso, basta clicar no botão abaixo.<br/><br/>";
            $body .= "<a href='$link' style='background-color: #212529; padding: 8px 8px; border: none; color: white; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;'>Confirmar Cadastro</a>";
            $details = [
                'email' => $user->email,
                'subject' => 'Confirmação de Email',
                'title' => "Olá, " . $user->name . ".",
                'body' => $body
            ];
            dispatch(new SendEmailJob($details));
//            MailHelper::instance()->sendMail($subject, $body, $user);
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

    public function forgotPassword(Request $request)
    {
        return view('auth.forgotPassword');
    }

    public function estagioVoluntario(Request $request): RedirectResponse
    {
        $registerValidated = $request->validate([
            'name' => 'required',
            'email' => 'required'

        ]);
        $body = "Email: " . $request['email'] . ".<br/><br/>";
        $body .= $request['message'];
        $details = [
            'email' => $request['email'],
            'subject' => 'Estágio Voluntário',
            'title' => "Mensagem de " . $request['name'],
            'body' => $body
        ];
        dispatch(new SendEmailJob($details));
        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }

    public function projetos()
    {
        $projects = Project::get();
        return view('projetos', ['projects' => $projects]);
    }
}
