protected function sendLoginResponse(Request $request)
    {

         Session::flash('flash_message', ''.Auth::user()->name);
         Session::flash('flash_ip', ''.Auth::user()->ip);
         Session::flash('flash_connection', ''.Auth::user()->connection);
         
         
         $now = new \DateTime();
         $usuario = User::findOrFail(Auth::user()->id);
         $usuario->ip = \Request::ip();
         $usuario->connection = $now->format('d-m-Y H:i:s');
         $usuario->update();

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());

    }