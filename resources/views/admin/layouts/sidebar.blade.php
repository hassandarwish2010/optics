
kkkkkkkkkkkkkkkkkkkk
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="#" class="waves-effect">
                  <img src="{{ asset('public/admin/images/avatar.jpg') }}" alt="{{ auth()->user()->name }}" class="img-circle">
                  <span class="hide-menu">{{ auth()->user()->name }}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('admin.get.profile') }}"><i class="ti-user"></i> {{ __('lang.profile') }} </a></li>
                    <li><a href="{{ route('mails.index', 0) }}"><i class="ti-email"></i> Inbox</a></li>
                    <li><a href="{{ route('setting.index') }}"><i class="ti-settings"></i> Site Setting</a></li>
                    <li>
                      <a href="javascript:void(0)"
                         onclick="event.preventDefault(); document.getElementById('side-bar-logout-form').submit();">
                         <i class="fa fa-power-off"></i>
                          {{ __('Logout') }}
                          <form id="side-bar-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </a>
                    </li>
                </ul>
            </li>
            <li class="nav-small-cap m-t-10"> --- Main Navigation </li>

            <li>
              <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                <i class="fa fa-dashboard fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.dashboard') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('admins.index') }}" class="waves-effect">
                <i class="fa fa-users fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.admins') }} </span>
              </a>
            </li>

            {{--
            <li>
              <a href="{{ route('categories.index') }}" class="waves-effect">
                <i class="fa fa-folder fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.categories') }} </span>
              </a>
            </li>
            --}}

            <li>
              <a href="{{ route('brands.index') }}" class="waves-effect">
                <i class="fa fa-bookmark fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.brands') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('products.index') }}" class="waves-effect">
                <i class="fa fa-cart-plus fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.products') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('contact_lenses.index') }}" class="waves-effect">
                <i class="fa fa-cart-plus fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.contact_lenses') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('stores.index') }}" class="waves-effect">
                <i class="fa fa-university fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.stores') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('banners.index') }}" class="waves-effect">
                <i class="fa fa-home fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.banners') }} </span>
              </a>
            </li>

            {{--
            <li>
              <a href="{{ route('agents.index') }}" class="waves-effect">
                <i class="fa fa-archive fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.agents') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('jobs.index') }}" class="waves-effect">
                <i class="fa fa-handshake-o fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.jobs') }} </span>
              </a>
            </li>

            <li>
              <a href="{{ route('news.index') }}" class="waves-effect">
                <i class="fa fa-book fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.news') }} </span>
              </a>
            </li>
            --}}

            <li>
              <a href="{{ route('about.index') }}" class="waves-effect">
                <i class="fa fa-info fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.about') }} </span>
              </a>
            </li>

            <li>
              <a href="#" class="waves-effect">
                <i class="fa fa-envelope fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.mails') }}
                  <span class="fa arrow"></span>
                </span>
              </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('mails.index', 0) }}"> {{ __('lang.notseen_mails') }} </a></li>
                    <li><a href="{{ route('mails.index', 1) }}"> {{ __('lang.seen_mails') }} </a></li>
                    <li><a href="{{ route('mails.index', 2) }}"> {{ __('lang.replied_mails') }} </a></li>
                </ul>
            </li>

            <li>
              <a href="{{ route('setting.index') }}" class="waves-effect">
                <i class="fa fa-cogs fa-fw"></i>
                <span class="hide-menu"> {{ __('lang.setting') }} </span>
              </a>
            </li>
        </ul>
    </div>
</div>
