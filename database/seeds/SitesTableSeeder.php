<?php

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intervals = [
            30, 45, 60, 75, 90, 105, 120, 150, 180, 210, 240, 270, 300
        ];
        $uniqueip = [
            0, 6, 12, 24, 48, 60, 72, 84
        ];
        $data = [
            [
                'title' => 'Строй свой Дом',
                'url' => 'stroy-svoj-dom.ua'
            ],
            [
                'title' => 'Свой Дом построй',
                'url' => 'svoj-dom-postroy.ua'
            ],
            [
                'title' => 'Построй свой Дом',
                'url' => 'postroy-svoj-dom.ua'
            ],
            [
                'title' => 'Строй свой Дом',
                'url' => '2-stroy-svoj-dom.ua'
            ],
            [
                'title' => 'Свой Дом построй',
                'url' => '2-svoj-dom-postroy.ua'
            ],
            [
                'title' => 'Построй свой Дом',
                'url' => '2-postroy-svoj-dom.ua'
            ],
            [
                'title' => 'Строй свой Дом',
                'url' => '3-stroy-svoj-dom.ua'
            ],
            [
                'title' => 'Свой Дом построй',
                'url' => '3-svoj-dom-postroy.ua'
            ],
            [
                'title' => 'Построй свой Дом',
                'url' => '3-postroy-svoj-dom.ua'
            ],
        ];

        foreach ($data as $item) {
            $item['balance'] = rand(1, 99);
            $item['hits'] = rand(1000, 999999);
            $item['hosts'] = rand(100, 9999);
            $item['user_id'] = 2;
            $item['time'] = $intervals[rand(0,12)];
            $item['uniqueip'] = $uniqueip[rand(0,7)];
            $item['impfrom'] = rand(3,7);
            $item['impto'] = rand(7,30);
            $item['hourlimit'] = rand(3,10);
            $item['daylimit'] = rand(10,100);

            $site = \App\Site::create($item);

            if ($site->wasRecentlyCreated) {
                $this->command->getOutput()->writeln("Created new sile <comment>id.{$site->id}</comment>: <info>{$site->url}</info>");
            }
        }
    }
}
