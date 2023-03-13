<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme m-5">
          <div class="app-brand demo">
            <a href="<?=$path?>dashboard" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="<?=$g_icon;?>" height="32" width="32">
              </span>
              <span class="app-brand-text demo menu-text fw-bold"><?=$g_title;?></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Сурагч">Сурагч</div>
                <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="<?=$path?>list" class="menu-link">
                    <div data-i18n="Жагсаалт">Жагсаалт</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?=$path?>category" class="menu-link">
                    <div data-i18n="Нэмэх">Нэмэх</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Хүний нөөц">Хүний нөөц</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?=$path?>employer" class="menu-link">
                    <div data-i18n="Жагсаалт">Жагсаалт</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar.html" class="menu-link">
                    <div data-i18n="Нэмэх">Нэмэх</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-content-navbar-with-sidebar.html" class="menu-link">
                    <div data-i18n="Төлөвлөгөө">Төлөвлөгөө</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="lesson" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Ирц">Ирц</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Санхүү">Санхүү</div>
                <div class="badge bg-label-danger rounded-pill ms-auto">6</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?=$path?>finance" class="menu-link">
                    <div data-i18n="Мөнгөн урсгал">Мөнгөн урсгал</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-invoice-preview.html" class="menu-link">
                    <div data-i18n="Төрөл">Төрөл</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-invoice-edit.html" class="menu-link">
                    <div data-i18n="Төлбөр">Төлбөр</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-invoice-add.html" class="menu-link">
                    <div data-i18n="Цалин">Цалин</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-invoice-add.html" class="menu-link">
                    <div data-i18n="Өглөг">Өглөг</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-invoice-add.html" class="menu-link">
                    <div data-i18n="Хувьсах">Хувьсах</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Эд хөрөнгө">Эд хөрөнгө</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="app-user-list.html" class="menu-link">
                    <div data-i18n="List">List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="View">View</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="app-user-view-account.html" class="menu-link">
                        <div data-i18n="Account">Account</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-user-view-security.html" class="menu-link">
                        <div data-i18n="Security">Security</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-user-view-billing.html" class="menu-link">
                        <div data-i18n="Billing & Plans">Billing & Plans</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-user-view-notifications.html" class="menu-link">
                        <div data-i18n="Notifications">Notifications</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="app-user-view-connections.html" class="menu-link">
                        <div data-i18n="Connections">Connections</div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Тайлан">Тайлан</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="report" class="menu-link">
                    <div data-i18n="Тайлан 1">Тайлан 1</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-access-permission.html" class="menu-link">
                    <div data-i18n="Тайлан 2">Тайлан 2</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file"></i>
                <div data-i18n="Параметр">Параметр</div>
              </a>
                
                  <ul class="menu-sub">
                  <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link">
                    <div data-i18n="Албан тушаал">Албан тушаал</div>
                  </a>
                  </li>
                    <li class="menu-item">
                      <a href="<?=$path?>sector" class="menu-link">
                        <div data-i18n="Бүлэг">Бүлэг</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-teams.html" class="menu-link">
                        <div data-i18n="Цалингийн сүлжээ">Цалингийн сүлжээ</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-projects.html" class="menu-link">
                        <div data-i18n="Харилцагч байгууллага">Харилцагч байгууллага</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-connections.html" class="menu-link">
                        <div data-i18n="Сурагчийн хөнгөлөлт">Сурагчийн хөнгөлөлт</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="pages-profile-connections.html" class="menu-link">
                        <div data-i18n="Амралтын өдрүүд">Амралтын өдрүүд</div>
                      </a>
                    </li>
                  </ul>
                </li>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div data-i18n="Үйл ажилгааны тайлан">Үйл ажилгааны тайлан</div>
              </a>
                
                  <ul class="menu-sub">
                  <li class="menu-item">
                  <a href="in_percent" class="menu-link">
                    <div data-i18n="Хичээлийн хувиар">Хичээлийн хувиар</div>
                  </a>
                  </li>
                    <li class="menu-item">
                      <a href="plan" class="menu-link">
                        <div data-i18n="Хичээлийн хөтөлбөр">Хичээлийн хөтөлбөр</div>
                      </a>
                    </li>
                  </ul>
                </li>
            </li>
            <li class="menu-item">
              <a href="content" class="menu-link">
                <i class="menu-icon tf-icons ti ti-video"></i>
                <div data-i18n="Контент">Контент</div>
              </a>
            </li>
            

          </ul>
        </aside>