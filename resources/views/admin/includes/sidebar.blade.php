<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-clipboard"></i>
                    <p>
                        Посты
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.news.index') }}" class="nav-link">
                            <p>Новости</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.post.index') }}" class="nav-link">
                            <p>Статьи</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.advertisement.index') }}" class="nav-link">
                            <p>Обьявления</p>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Категории
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                            <p>Статьи</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category_advertisement.index') }}" class="nav-link">
                            <p>Обьявления</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.category_work.index') }}" class="nav-link">
                            <p>Вакансии</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        Теги
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
