<?php

class Posts
{
    public function __construct()
    {
        echo "posts loaded\n";
    }

    public function about($id, $anotherId)
    {
        echo "From about posts";
        echo "\n";
        echo $id;
        echo "\n";
        echo $anotherId;
    }
}