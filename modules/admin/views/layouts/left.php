<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'Редактировать данные', 'icon' => 'file-code-o', 'url' => ['/admin/main/view']],
                    ['label' => 'Документы', 'icon' => 'file-code-o', 'url' => ['/admin/document/index']],
                    ['label' => 'Страницы сайта', 'icon' => 'file-code-o', 'url' => ['/admin/page/index']],
                    ['label' => 'Услуги', 'icon' => 'file-code-o', 'url' => ['/admin/services/index']],
                    ['label' => 'Болезни',
                        'icon' => 'file-code-o',
                        'url' => '#',
                        'items' => [
                        ['label' => 'Категории', 'icon' => 'gear', 'url' => ['/admin/category/index'],],
                        ['label' => 'Список болезней', 'icon' => 'gear', 'url' => ['/admin/disease/index'],],
                    ],
                    ],
                    ['label' => 'Статьи', 'icon' => 'file-code-o', 'url' => ['/admin/article/index']],

                ],
            ]
        ) ?>

    </section>

</aside>
