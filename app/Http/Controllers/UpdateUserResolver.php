<?php

namespace App\Http\Controllers;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class UpdateUserResolver
{
    public function updateUserResolver($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $findUser = User::where("id",$args['id'])->get()->first();

        $success = FALSE;
        if (!empty($findUser)) {
            $findUser->name = $args['name'];
            $findUser->password =  $args['password'] == "null" ? $findUser->password:  bcrypt($args['password']);
            $findUser->update();
            $success = TRUE;
        }

        return [
            'success'  => $success
        ];
        
    }
    
}
