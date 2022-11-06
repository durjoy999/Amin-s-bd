<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (Auth::guard('admin')->user()->can('dashboard.index'))
                    <li class="@yield('home_active')">
                        <a class="active" href="{{ route('admin.home') }}">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('admin.index') || Auth::guard('admin')->user()->can('role.index'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow" >
                            <i data-feather="users"></i>
                            <span data-key="t-ecommerce">Admin Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('admin.index'))
                            <li><a class="" href="{{ route('admin.admin.index') }}" key="t-products"><i data-feather="user"></i>Admins</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('role.index'))
                            <li><a class="@yield('admin_roles_active')" href="{{ route('admin.roles.index') }}" data-key="t-product-detail"><i data-feather="user"></i>Roles</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('generalSettings.index') || Auth::guard('admin')->user()->can('configSettings.index'))
                    <li class="@yield('settings_active')">
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="settings"></i>
                            <span data-key="t-ecommerce">Settings</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @if (Auth::guard('admin')->user()->can('generalSettings.index'))

                            <li><a class="@yield('settings_general_active')" href="{{ route('admin.settings.general') }}"> <i data-feather="settings"></i>General</a></li>
                            @endif
                            @if (Auth::guard('admin')->user()->can('configSettings.index'))

                            <li><a class="@yield('settings_config_active')" href="{{ route('admin.settings.config') }}"> <i data-feather="settings"></i>Config</a></li>
                            @endif



                        </ul>
                    </li>
                @endif
                </li>
                     <li>
                          <a href="{{ route('admin.sliders.index') }}">
                              <i class="fab fa-blogger"></i>
                              <span data-key="t-chat">Sliders</span>
                          </a>
                     </li>
                      <li>
                          <a href="{{ route('admin.requestsQuotes.index') }}">
                              <i class="fas fa-quote-left"></i>
                              <span data-key="t-chat">Request Quotes</span> <span class="text text-danger"> ()</span>
                          </a>
                      </li>
                     <li>
                            <a href="{{ route('admin.services.index') }}">
                                <i class="fab fa-servicestack"></i>
                                <span data-key="t-chat">Services</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.authorizeds.index') }}">
                                <i class="fas fa-user-astronaut"></i>
                                <span data-key="t-chat">Authorized Of</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.testimonials.index') }}">
                                <i class="fas fa-align-left"></i>
                                <span data-key="t-chat">Testimonial</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogs.index') }}">
                                <i class="fab fa-blogger"></i>
                                <span data-key="t-chat">Blogs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.concerns.index') }}">
                                <i class="fas fa-disease"></i>
                                <span data-key="t-chat">Concerns ( We Are Working With )</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.awards.index') }}">
                                <i class="fas fa-trophy"></i>
                                <span data-key="t-chat">Awards</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.carrers.index') }}">
                                <i class="fas fa-baby-carriage"></i>
                                <span data-key="t-chat">Career</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="fas fa-shipping-fast"></i>
                                <span data-key="t-email">Shipping</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{ route('admin.countrys.index') }}">
                                        <i class="fas fa-flag"></i>
                                        <span data-key="t-chat">Country</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.ProductTypes.index') }}">
                                        <i class="fab fa-product-hunt"></i>
                                        <span data-key="t-chat">Product Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.ShippingCosts.index') }}">
                                        <i class="fas fa-shipping-fast"></i>
                                        <span data-key="t-chat">Shipping Cost</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('admin.contacts.index') }}">
                                <i class="fas fa-file-contract"></i>
                                <span data-key="t-chat">Contact</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.partners.index') }}">
                                <i class="fas fa-handshake"></i>
                                <span data-key="t-chat">Partners</span>
                            </a>
                        </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
