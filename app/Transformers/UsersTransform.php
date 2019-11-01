<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UsersTransform extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'username' => $user->username,
            'action' => '<center><a href="#" onclick="edit(' . $user->id . ')" class="btn btn-warning btn-sm btn-xs" rel="tooltip" title="Edit"><i class="material-icons">edit</i><div class="ripple-container"></div></a><a href="#" onclick="delete(' . $user->id . ')" class="btn btn-danger btn-sm btn-xs" rel="tooltip" title="Edit"><i class="material-icons">delete</i><div class="ripple-container"></div></a></center>',
            // 'password' => $user->password,
        ];
    }
}
