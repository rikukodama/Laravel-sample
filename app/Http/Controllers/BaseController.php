<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public function beforeFilter()
    {
        $this->middleware('auth', ['except' => ['reset', 'resetEnd', 'passEdit']]);

        $this->Auth = Auth::setDefaultDriver('web');
        $this->Auth->setFields([
            'username' => 'LOGIN_ID',
            'password' => 'PASSWORD'
        ]);

        $this->Set_View_Option();
    }

    // Other base controller methods
}
