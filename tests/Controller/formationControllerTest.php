<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of formationControllerTest
 *
 * @author hachm
 */
class formationControllerTest extends WebTestCase{
     
    public function testtriformation(){
        
        $client = static::createClient();
        $client->request('GET','/formations');
        $crawler = $client ->submitForm('filtrer',[
            'recherche '=>'C# : ListBox en couleur'
        ]);
        $this->assertCount(1, $crawler->filter('h5'));
        
        $this->assertSelectorTextContains('h5','C# : ListBox en couleur');
    }
    
    //tester la presence d'un element 
    public function testcontenuformations(){
        $client = static::createClient();
        $client->request('GET','/formations');
        $this->assertSelectorTextContains('th','formation');
    } 
}
