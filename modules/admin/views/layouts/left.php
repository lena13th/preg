<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'Редактировать данные', 'icon' => 'file-code-o', 'url' => ['main/view']],
                    ['label' => 'Документы', 'icon' => 'file-code-o', 'url' => ['document/index']],
                    ['label' => 'Страницы сайта', 'icon' => 'file-code-o', 'url' => ['page/index']],
                    ['label' => 'Услуги', 'icon' => 'file-code-o', 'url' => ['services/index']],
                    ['label' => 'Болезни',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                        ['label' => 'Категории', 'icon' => 'gear', 'url' => ['category/index'],],
                        ['label' => 'Список болезней', 'icon' => 'gear', 'url' => ['disease/index'],],
                    ],
                    ],
                    ['label' => 'Статьи', 'icon' => 'file-code-o', 'url' => ['article/index']],

                ],
            ]
        ) ?>

    </section>

</aside>
