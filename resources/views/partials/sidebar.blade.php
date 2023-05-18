<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <div class="d-flex sidebar-profile">
          <div class="sidebar-profile-image">
            <img src="https://images.tokopedia.net/img/cache/300/tPxBYm/2023/1/20/0c372e2a-77da-496f-96c9-a453b449f85d.jpg" alt="image">
            <span class="sidebar-status-indicator"></span>
          </div>
          <div class="sidebar-profile-name">
            <p class="sidebar-name">
              {{ Auth::user()->name }}
            </p>
            <p class="sidebar-designation">
              Welcome
            </p>
          </div>
        </div>
        
        <p class="sidebar-menu-title">Dash menu</p>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/question">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Question</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="/category_name">
          <i class="typcn typcn-document-text menu-icon"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>
    </ul>
  </nav>