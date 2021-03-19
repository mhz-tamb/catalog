<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

/**
 * Class: CatalogSeeder
 * @see Illuminate\Database\Seeder
 * @package Database\Seeders
 */
class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        $create = function ($catalog, $parent = null) use (&$create) {
            foreach ($catalog as $category) {
                $categoryModel = Category::create([
                    'parent_id' => $parent->id ?? null,
                    'name' => $category['name']
                ]);

                if (isset($category['children'])) {
                    $create($category['children'], $categoryModel);
                }

                if (isset($category['products'])) {
                    foreach ($category['products'] as $product) {
                        $productModel = new Product([
                            'name' => $product['name'],
                            'price' => $product['price'],
                            'description' => $product['description']
                        ]);

                        $categoryModel->products()->save($productModel);
                    }
                }
            }
        };

        $create($this->catalog());
    }

    /**
     * Return array of catalog items
     * @return array
     */
    protected function catalog(): array
    {
        return [
            [
                'name' => 'Бытовая техника',
                'children' => [
                    [
                        'name' => 'Товары для кухни',
                        'children' => [
                            [
                                'name' => 'Тостеры',
                                'products' => [
                                    [
                                        'name' => 'Тостер BBK TR72M оранжевый',
                                        'price' => '750',
                                        'description' => 'Тостер BBK TR72M представляет собой надежное устройство с интересным дизайном. Имеющая сочную оранжевую расцветку корпуса модель станет ключевым украшением любой кухне, дополнив собой "ансамбль" размещенных в ней приборов. За счет компактности эту технику можно установить даже в самой миниатюрной кухонной зоне.',
                                        'properties' => [
                                            'width' => '23.1',
                                            'height' => '16.2',
                                            'weight' => '0.9'
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'name' => 'Электрочайники',
                                'products' => [
                                    [
                                        'name' => 'Электрочайник Irit IR-1121 синий',
                                        'price' => 280,
                                        'description' => 'Электрочайник Irit IR-1121 изготовлен из качественного термостойкого пластика, который даже при сильном нагревании не выделяет никаких сторонних запахов и привкусов.',
                                        'properties' => [
                                            'width' => '12',
                                            'height' => '17',
                                            'weight' => '0.167'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Товары для дома',
                        'children' => [
                            [
                                'name' => 'Стиральные машины',
                                'products' => [
                                    [
                                        'name' => 'Стиральная машина Indesit IWUB 4085 (CIS)',
                                        'price' => 12699,
                                        'description' => 'Запросы даже самого взыскательного клиента удовлетворит стиральная машина Indesit IWUB 4085. Она относится к моделям фронтального способа загрузки белья в барабан, который рассчитан на единовременную стирку до 4 кг вещей.',
                                        'properties' => [
                                            'width' => '64.5',
                                            'height' => '88.8',
                                            'weight' => '60'
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'name' => 'Пылесосы',
                                'products' => [
                                    [
                                        'name' => 'Пылесос автомобильный Starwind CV-100',
                                        'price' => 499,
                                        'description' => 'Автомобильный пылесос Starwind CV-100 с циклонным фильтром предельно прост: на нем всего две кнопки – для включения/выключения и снятия контейнера.',
                                        'properties' => [
                                            'width' => '10',
                                            'height' => '20',
                                            'weight' => '1000'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Смартфоны, планшеты и фототехника',
                'children' => [
                    [
                        'name' => 'Смартфоны и гаджеты',
                        'children' => [
                            [
                                'name' => 'Смартфоны',
                                'products' => [
                                    [
                                        'name' => '6.1" Смартфон Apple iPhone 11 128 ГБ черный',
                                        'description' => 'Корпус смартфона Apple iPhone 11 с диагональю 6.1" выполнен из металла и украшен стеклянной панелью. Черный цвет устройства притягивает, что наряду с зеркальным блеском стекла создает весьма гармоничный дизайн.',
                                        'price' => 55199,
                                        'properties' => [
                                            'width' => '75.7',
                                            'height' => '150.9',
                                            'weight' => '194'
                                        ]
                                    ]
                                ]
                            ],
                            [
                                'name' => 'Сотовые телефоны',
                                'products' => [
                                    [
                                        'name' => 'Сотовый телефон Joy\'s S16 черный',
                                        'price' => 499,
                                        'description' => 'Сотовый телефон Joy\'s S16 оснащен дисплеем диагональю 1.44 дюйма и двумя слотами для установки карт SIM.',
                                        'properties' => [
                                            'width' => '47',
                                            'height' => '107',
                                            'weight' => '66'
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        'products' => [
                            [
                                'name' => 'Фитнес-браслет Smarterra FitMaster 4',
                                'price' => 570,
                                'description' => 'Фитнес-браслет Smarterra FitMaster 4 в черно-зеленом корпусе обладает сенсорным управлением и возможностью интеграции с устройствами на основе Android и iOS.',
                                'properties' => [
                                    'width' => '30',
                                    'height' => '210',
                                    'weight' => '35'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
