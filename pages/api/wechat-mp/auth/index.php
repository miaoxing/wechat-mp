<?php

use Miaoxing\Plugin\BaseController;
use Miaoxing\Plugin\Service\User;

return new class extends BaseController {
    public function get()
    {
        $user = User::cur();

        $isAuthed = (bool) $user->mobileVerifiedAt;

        return suc([
            'isAuthed' => $isAuthed,
        ]);
    }
};
