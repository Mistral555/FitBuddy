<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testSuccessfulLogin(): void
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('button', 'Se connecter');

        $form = $crawler->selectButton('Se connecter')->form([
            'email' => 'andry@gmail.com',
            'password' => 'andry2000'
        ]);

        $client->submit($form);
        //$this->assertResponseRedirects('/');
        //$client->followRedirect();
        //$this->assertRouteSame('home');
        //$this->assertSelectorTextContains('h1', 'You are logged in as');
        //$this->assertSelectorExists('a[href="' . $client->getContainer()->get('router')->generate('app_logout') . '"]');
    }
    public function testLoginWithBadCredential(): void
    {
        $client = static::createClient();
        
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('button', 'Se connecter');

        $form = $crawler->selectButton('Se connecter')->form([
            'email' => 'andry@gmail.com',
            'password' => 'fakepassword'
        ]);

        $client->submit($form);
        //$this->assertResponseRedirects();
        //$client->followRedirect();
    }
}