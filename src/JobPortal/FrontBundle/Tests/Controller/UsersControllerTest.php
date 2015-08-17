<?php

namespace JobPortal\FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest extends WebTestCase
{
    public function testUserregister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userRegister');
    }

    public function testUserlogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userLogin');
    }

    public function testForgetpassword()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/forgetPassword');
    }

    public function testUserloginfacebook()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userLoginFacebook');
    }

    public function testUserprofile()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userProfile');
    }

    public function testUserupdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/userUpdate');
    }

}
