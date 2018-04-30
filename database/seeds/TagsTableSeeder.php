<?php
use Illuminate\Database\Seeder;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = ['women', 'man', 'favorite'];
        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}