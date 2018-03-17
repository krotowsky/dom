<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;


class AuthController extends Controller
{

    /**
     * @Route("api/user")
     */
    public function postAction(Request $request)
    {

        $username = $request->headers->get('username');
        $json = $request->getContent();
        $user = $this->getDoctrine()->getRepository(User::class)
            ->findBy([
                'username' => $username
            ]);
        if(!$user){
            throw new BadCredentialsException();
        }else{
            $obj = json_decode($json, true);

        }
        return new Response("Access granted to " . $obj['frontendOrderNumber']);
    }

}