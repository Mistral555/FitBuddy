<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();

        // Ajoutez les valeurs du formulaire ici en fonction de votre implémentation
        $form = $crawler->selectButton('Login')->form();
        $form['_username'] = 'your_username';
        $form['_password'] = 'your_password';

        $client->submit($form);

        $this->assertResponseRedirects(); // Vérifie si la redirection après la connexion est correcte
        $client->followRedirect(); // Suivre la redirection

        $this->assertRouteSame('home'); // Assurez-vous que vous êtes redirigé vers la bonne route
        $this->assertSelectorExists('.your-selector-for-success'); // Vérifiez si le message de succès est présent
    }

    public function testLogout(): void
    {
        $client = static::createClient();
        $client->request('GET', '/logout');

        // Assurez-vous que la réponse est une redirection
        $this->assertResponseRedirects();

        // Suivez la redirection
        $client->followRedirect();

        // Assurez-vous que la route après la déconnexion est correcte
        $this->assertRouteSame('your_target_route_after_logout');
    }
}
