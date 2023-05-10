<?php

namespace App\Models;

class Note 
{
    private static $notes = [
        [
            "title" => "New Note",
            "slug" => "judul-post-pertama",
            "author" => "Salma Nadhira",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum blanditiis explicabo animi, ullam obcaecati voluptatum quaerat laboriosam necessitatibus recusandae, tempora, exercitationem aperiam consequuntur magni esse! Temporibus a placeat illo cumque!"
        ],
        [
            "title" => "New Note 2",
            "slug" => "judul-post-kedua",
            "author" => "Pramudya Oktareza",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ducimus. Quas facilis voluptas provident quos rerum quod voluptate autem, adipisci, ab rem expedita dignissimos amet, libero optio reiciendis voluptatum beatae blanditiis inventore perspiciatis? Nobis fuga assumenda suscipit praesentium veritatis, id, dolor esse ipsum possimus modi laboriosam. Harum magnam fuga id, enim illum nihil. Saepe ipsum optio dicta exercitationem omnis fugit maiores totam assumenda et dignissimos, natus perspiciatis quis commodi neque eius atque hic quia adipisci accusamus excepturi facere, cupiditate vero."
        ]
    ];

    public static function all() {
        return self::$notes;
    }

    public static function find($slug) {
        $notes = self::$notes;
        $note = [];
        foreach($notes as $n) {
            if($n["slug"] === $slug) {
                $note = $n;
            }
        }
        return $note;
    }
}
