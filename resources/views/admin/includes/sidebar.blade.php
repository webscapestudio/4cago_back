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
              <p>Основной раздел</p>
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
              <p>Основной раздел</p>
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

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th-list"></i>
          <p>
            FAQ
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('admin.rule.index') }}" class="nav-link">
              <p>Правила</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Помощь
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('admin.category_question.index') }}" class="nav-link">
                  <p>Категории вопросов</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.asked_question.index') }}" class="nav-link">
                  <p>Вопросы</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.faq_marketing.index') }}" class="nav-link">
              <p>Реклама</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">
              <p>Контакты</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th-list"></i>
          <p>
            Реклама
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('admin.right_banner.index') }}" class="nav-link">
              <p>Банера справа</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.left_banner.index') }}" class="nav-link">
              <p>Баннера слева</p>
            </a>
          </li>

        </ul>
      </li>
    </ul>
  </div>
  <!-- /.sidebar -->
</aside>
