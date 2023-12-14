<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Hobbyist<span>Hub</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
            <a href="{{route('all.type')}}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Category</span>
            </a>
            <a href="{{route('sub.type')}}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Sub Category</span>
            </a>
            <a href="{{route('brand.type')}}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Brand</span>
            </a>
            <a href="{{route('products.type')}}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Product</span>
            </a>

            <a href="{{route('orders.type')}}" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">All Orders</span>
            </a>
          </li>
          <li class="nav-item nav-category">web apps</li>
          <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Email</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="emails">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="https://mail.google.com/" target="_blank" class="nav-link">All Emails</a>
                </li>
                <li class="nav-item">
                    <a href="https://mail.google.com/" target="_blank" class="nav-link">Inbox</a>
                </li>
                <li class="nav-item">
                    <a href="https://mail.google.com/" target="_blank" class="nav-link">Read</a>
                </li>
                <li class="nav-item">
                    <a href="https://mail.google.com/" target="_blank" class="nav-link">Compose</a>
                </li>
            </ul>
        </div>

          </li>
        <li class="nav-item">
            <a href="https://chat.google.com/" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="message-square"></i>
                <span class="link-title">Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="https://calendar.google.com/" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="calendar"></i>
                <span class="link-title">Calendar</span>
            </a>
        </li>
          
          
          
          
        </ul>
      </div>
    </nav>
    