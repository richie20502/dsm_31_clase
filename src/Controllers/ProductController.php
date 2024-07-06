<?php

namespace App\Controllers;
use App\Models\Category;

class ProductController {

    private $category;
    public function __construct(){
        $this->category = new Category();
    }

    public function create(){
        $categories= $this->category->getAll();
        require __DIR__ ."/../Views/products/create.php";
    }
}