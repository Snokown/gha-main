<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        // GET Homepage Content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_SERVER['SERVER_NAME']."/cockpit/api/singletons/get/home_page?token=6dd05df05d8b0c2e86d7bbe7cf9e42");
        // SSL important
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 

        $output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($output);

        // GET Posts
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_SERVER['SERVER_NAME']."/cockpit/api/collections/get/blog_posts?token=6dd05df05d8b0c2e86d7bbe7cf9e42&sort[_created]=desc&limit=3");
        // SSL important
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 

        $output = curl_exec($ch);
        curl_close($ch);

        $post_results = json_decode($output);

        $data = array(
            'title' => $result->title,
            'jumbotron_heading_1' => $result->jumbotron_heading_1,
            'jumbotron_heading_2' => $result->jumbotron_heading_2,
            'jumbotron_bg_img' => $result->jumbotron_bg_img,
            'about_us' => $result->about_us,
            'services' => $result->services,
            'service_image' => $result->service_image,
            'posts' => $post_results->entries
        );

        return view('pages.index')->with($data);
    }
}
