<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function redirectToRoute(string $name, array $parameters = [], bool $external = false, int $code = 302)
    {
        return $this->response->redirect(
            array_merge(['for' => $name], $parameters),
            $external,
            $code
        );
    }
}
