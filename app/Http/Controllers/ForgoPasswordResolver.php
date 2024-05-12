<?php

namespace App\Http\Controllers;

use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgoPasswordResolver
{
    public function checkUserEmail($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $findUser = User::where("email",$args['email'])->get()->first();

        $status = "400";
        $message = "User not found";
        if (!empty($findUser)) {
            $status = "200";
            $message = ForgoPasswordResolver::genCode(10);
        }

        return [
            'status'  => $status,
            'message' => $message,
        ];
        
    }

    function genCode($longi = 8) {
        $characteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
    
        for ($i = 0; $i < $longi; $i++) {
            $code .= $characteres[rand(0, strlen($characteres) - 1)];
        }
    
        return $code;
    }

    
}
