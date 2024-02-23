<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testRegister(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');

        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton('Register')->form();
        // Ajoutez les valeurs du formulaire ici en fonction de votre implémentation
        $form['registration_form[email]'] = 'test@example.com';
        $form['registration_form[plainPassword]'] = 'password123';

        $client->submit($form);

        $this->assertResponseRedirects(); // Vérifie si la redirection après l'inscription est correcte
        $client->followRedirect(); // Suivre la redirection

        $this->assertRouteSame('app_register'); // Assurez-vous que vous êtes redirigé vers la bonne route
        $this->assertSelectorExists('.alert.alert-success'); // Vérifiez si le message de succès est présent
    }

    public function testVerifyUserEmail(): void
    {
        $client = static::createClient();

        // Simulez une demande POST pour vérifier l'e-mail
        $client->request('POST', '/verify/email');

        // Assurez-vous que la réponse est une redirection
        $this->assertResponseRedirects();

        // Suivez la redirection
        $client->followRedirect();

        // Assurez-vous que la route après la vérification est correcte
        $this->assertRouteSame('app_register');

        // Assurez-vous que le message de succès est présent
        $this->assertSelectorExists('.alert.alert-success');
    }
}
