<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
  /**
  * A basic functional test example.
  *
  * @return void
  */
  public function testBasic()
  {
    $this->visit('/')
    ->see('welcome');
  }

  // Test adding a brand to the database.
  public function testAddBrand()
  {
    // Visit the login page. Enter the email and password defined and then click the login button.
    // The returned page should be the homepage.
    $this->visit('/login')
    ->type('finpickford93@gmail.com', 'email')
    ->type('password', 'password')
    ->press('Login')
    ->seePageIs('/');

    // Visit the brands page, type Hamilton into the brand field and then press the add brand button.
    // The returned page should be brands.
    $this->visit('/brands')
    ->type('Hamilton', 'brand')
    ->press('Add brand')
    ->seePageIs('brands');
  }

  // Test updating a particular model.
  public function testUpdateModel() {

    // Visit the login page. Enter the email and password defined and then click the login button.
    // The returned page should be the homepage.
    $this->visit('/login')
    ->type('joebloggs@testing.com', 'email')
    ->type('password', 'password')
    ->press('Login')
    ->seePageIs('/');

    // Visit the brandmodels page with the id of 1.
    // Press the edit button. The returned page should be the edit page.
    // Type purple into the dial colour. Press update model button.
    // Returned page should be the updated page.
    $this->visit('/brandModels/1')
    ->press('Edit model')
    ->seePageIs('brandModels/1/edit')
    ->type('Purple', 'dial_colour')
    ->press('Update model')
    ->seePageIs('brandModels/1/update');
  }

  // Test the search function.
  public function testSearch() {

    // Visit the homepage. Search for rolex in the search bar and press search.
    // The page expected should be the search result view.
    $this->visit('/')
    ->type('Rolex', 'watchsearch')
    ->press('Search')
    ->seePageIs('/brand/search');
  }
}
