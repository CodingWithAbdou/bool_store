        <!-- ### $Topbar ### -->
        <div class="header navbar">
            <div class="header-container">
              <ul class="nav-left">
                <li>
                  <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                    <i class="fa-solid fa-bars"></i>
                  </a>
                </li>
                <li class="header-name">
                  test
                </li>
              </ul>
              <ul class="nav-right">
                <li class="dropdown">
                  <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-bs-toggle="dropdown">
                    <div class="peer mR-10">
                      <img class="w-2r bdrs-50p" src="{{ Auth::user()->profile_photo_url }}" alt="">
                    </div>
                    <div class="peer">
                      <span class="fsz-sm c-grey-900">{{ Auth::user()->name }}</span>
                    </div>
                  </a>
                  <ul class="dropdown-menu fsz-sm">
                    <li>
                      <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="fa-regular fa-user"></i>
                        <span>الملف الشخصي</span>
                      </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>خروج</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
