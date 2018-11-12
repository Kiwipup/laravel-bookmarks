<?php

use Illuminate\Database\Seeder;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bob = \App\User::where('name', 'Bob')->first();
        $cat_catalogue = \App\Catalogue::where('name', 'Cat Photos')->first();
        $book_catalogue = \App\Catalogue::where('name', 'Books to Read')->first();

        $both = [
            ['https://www.goodreads.com/book/show/34871726-cats-photo-book-vol-1', 'Cats Photo Book Vol.1']
        ];

        $cats = [
            ['https://66.media.tumblr.com/bc25df78f7d26518ba04e56426e5b60e/tumblr_msmk1pwmq81r3gb3zo1_400.gif', 'Cats are so weird', null],
            ['https://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg', null, null],
            ['https://www.readersdigest.ca/wp-content/uploads/sites/14/2011/01/4-ways-cheer-up-depressed-cat.jpg', 'Cute Baby Cat', 'So cute!']
        ];

        foreach ($cats as $cat) {

            // Create the bookmark
            $b = new \App\Bookmark;
            $b->user_id = $bob->id;
            $b->url = $cat[0];
            $b->name = $cat[1];
            $b->description = $cat[2];
            $b->save();

            // Add bookmark to cats catalogue
            // $b->catalogues()->attach($cat_catalogue->id);
            $cat_catalogue->bookmarks()->attach($b->id);

        }

        $books = [
            ['https://www.goodreads.com/book/show/29363501-fantastic-beasts-and-where-to-find-them', 'Fantastic Beasts', "The movie was good, let's try the book."]
        ];

        foreach ($books as $book) {

            // Create the bookmark
            $b = new \App\Bookmark;
            $b->user_id = $bob->id;
            $b->url = $book[0];
            $b->name = $book[1];
            $b->description = $book[2];
            $b->save();

            // Add bookmark to books to read catalogue
            $book_catalogue->bookmarks()->attach($b->id);

        }

        foreach ($both as $bookmark) {

            // Create the bookmark
            $b = new \App\Bookmark;
            $b->user_id = $bob->id;
            $b->url = $bookmark[0];
            $b->name = $bookmark[1];
            $b->description = null;
            $b->save();

            // Associate it with both cats and books to read
            $cat_catalogue->bookmarks()->attach($b->id);
            $book_catalogue->bookmarks()->attach($b->id);

        }

    }
}
