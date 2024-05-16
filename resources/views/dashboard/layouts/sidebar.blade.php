      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="{{route('home')}}">
                  <div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo d-flex">
                        <img src="{{ asset('logo.svg') }}" alt="">
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="mB-0 logo-text" style="font-family : 'Cairo', sans-serif !important">متجر الكتب</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n">
                    <i class="ti-arrow-circle-left"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- ### $Sidebar Menu ### -->
          <ul class="sidebar-menu scrollable pos-r">

            <li class="nav-item mT-30 ">
              <a class="sidebar-link" href="{{route('admin.home')}}">
                <span class="icon-holder">
                    <i class="fa-solid fa-house c-blue-300"></i>
                </span>
                <span class="title">الرئيسية</span>
              </a>
            </li>

            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{route('book.index')}}">
                <span class="icon-holder">
                    <i class="fa-solid fa-book c-red-300"></i>
                </span>
                <span class="title">الكتب</span>
              </a>
            </li>

            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{route('categories.admin.index')}}">
                <span class="icon-holder">
                    <i class="fa-solid fa-layer-group  c-green-500"></i>
                </span>
                <span class="title">التصنيفات</span>
              </a>
            </li>

            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{route('publishers.admin.index')}}">
                <span class="icon-holder">
                    <i class="fa-solid fa-print  c-orange-500"></i>
                </span>
                <span class="title">دور النشر</span>
              </a>
            </li>

            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{route('authors.admin.index')}}">
                <span class="icon-holder">
                    <i class="fa-solid fa-user-pen c-gray-500"></i>
                </span>
                <span class="title">المؤلفون</span>
              </a>
            </li>

            <li class="nav-item mT-30 actived">
              <a class="sidebar-link" href="{{route('users.index')}}">
                <span class="icon-holder">
                    <i class="fa-solid fa-users c-red-900"></i>
                </span>
                <span class="title">المستخدمون</span>
              </a>
            </li>

            {{-- <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-teal-500 ti-view-list-alt"></i>
                </span>
                <span class="title">منو چند سطحی</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown">
                  <a href="javascript:void(0);">
                    <span>آیتم منو</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a href="javascript:void(0);">
                    <span>آیتم منو</span>
                    <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="javascript:void(0);">آیتم منو</a>
                    </li>
                    <li>
                      <a href="javascript:void(0);">آیتم منو</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> --}}
          </ul>
        </div>
      </div>
