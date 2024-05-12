<?php

namespace App\Http\Controllers;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class UpdatePasswordResolver
{
    public function updatePasswordUser($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $findUser = User::where("email",$args['email'])->get()->first();

        $success = FALSE;
        if (!empty($findUser)) {
            $findUser->password = bcrypt($args['password']);
            $findUser->save();
            $success = TRUE;
        }

        return [
            'success'  => $success
        ];
        
    }
    
}
