<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Urls;

class UrlsTest extends TestCase
{
    public $url = "https://www.axdfkdl.com.do/";
    
    /**
     * 
     */
    public function testInsertUrl()
    {
        $url = Urls::short($this->url);
        $this->assertInstanceOf(
            Urls::class,
            $url
        );
    }

    /**
     * Test url created
     *
     * @return void
     */
    public function testGetByUrl()
    {
        $url = Urls::getByUrl($this->url);
        $this->assertInstanceOf(
            Urls::class,
            $url
        );
    }

    /**
     * Test url created
     *
     * @return void
     */
    public function testDeleteUrl()
    {
        $url = Urls::getByUrl($this->url);

        $this->assertTrue(
            $url->delete()
        );
    }
}
