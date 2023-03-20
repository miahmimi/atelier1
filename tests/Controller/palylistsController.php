<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of palylistsController
 *
 * @author hachm
 */
class palylistsController extends WebTestCase{
    public function testAccesPage(){
        $client = static::createClient();
        $client->request('GET','/playlists');//page des playlists
        $this->assertResponseIsSuccessful(Response::HTTP_OK);
    }
    
    //Tester le filtre
    public function testtriplaylist(){
        
        $client = static::createClient();
        $client->request('GET','/playlists');
        $crawler = $client ->submitForm('filtrer',[
            'recherche '=>'Visual Studio 2019 et C#'
        ]);
        $this->assertCount(1, $crawler->filter('h5'));
        
        $this->assertSelectorTextContains('h5','Visual Studio 2019 et C#');
    }
    
    //tester la presence d'un element 
    public function testcontenuplaylists(){
        $client = static::createClient();
        $client->request('GET','/playlists');
        $this->assertSelectorTextContains('th','playlist');
    } 
    
    //tester le click d'un button 
    public function testbouton(){
         $client = static::createClient();
        $client->request('GET','/playlists');
        
        $client ->click('1');
        $reponse=$client->getResponse();
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $uri=$client->getRequest()->server->get("REQUEST_URI");
        $this->assertEquals('/playlists/playlist/1', $uri);
                
        
    }
    
}
