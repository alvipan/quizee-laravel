<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold ms-2">
        <span class="text-primary">Quizee</span>admin
      </span>
    </a>

    <span class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none cursor-pointer">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </span>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li @class(['menu-item', 'active' => ($page == 'home')])>
      <a class="menu-link" href="/home">
        <i class="bx bx-home me-2"></i>
        <div data-i18n="Home">Home</div>
      </a>
    </li>
    <li @class(['menu-item', 'active' => ($page == 'users')])>
      <a class="menu-link" href="/users">
        <i class="bx bx-user me-2"></i>
        <div data-i18n="Users">Users</div>
      </a>
    </li>
    <li @class(['menu-item', 'active' => ($page == 'materials')])>
      <a class="menu-link" href="/materials">
        <i class="bx bx-book-content me-2"></i>
        <div data-i18n="Materials">Materials</div>
      </a>
    </li>
    <li @class(['menu-item', 'active' => ($page == 'questions')])>
      <a class="menu-link" href="/questions">
        <i class="bx bx-message-square-dots me-2"></i>
        <div data-i18n="Questions">Questions</div>
      </a>
    </li>
    <li class="menu-item">
      <a class="menu-link" href="/logout">
        <i class="bx bx-log-out me-2"></i> Logout
      </a>
    </li>
  </ul>
</aside>