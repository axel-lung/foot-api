<?php

declare(strict_types=1);

namespace ApiPlatform\Core\Action;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class NotFoundAction
{
    public function _invoke(){
        throw new NotFoundHttpException();
    }
}