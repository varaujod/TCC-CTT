<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UsuarioFiltro implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has("nivel"))
        {
            return redirect()->to(base_url("cliente"));
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}