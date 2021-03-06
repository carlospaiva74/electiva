            <div class="sidebar-wrapper sidebar-theme">
                
                <nav id="sidebar">
                    <div class="shadow-bottom"></div>

                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        
                        <li class="menu ">
                            <a href="{{route('home')}}" aria-expanded="false" class="dropdown-toggle" <?php if (request()->is('home','panel')) {
                                echo ' data-active="true"';
                            } ?>>
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span> Inicio</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu">
                            <a href="{{route('categorias.index')}}" aria-expanded="false" class="dropdown-toggle"
                            <?php if (request()->is('categorias','categorias/*')) {
                                    echo 'data-active="true"';
                                } ?>  
                            >   
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path fill="currentColor"  d="M12 2l-5.5 9h11z"/><circle fill="currentColor"  cx="17.5" cy="17.5" r="4.5"/><path fill="currentColor"  d="M3 13.5h8v8H3z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                                    <span>Categorías</span>
                                </div>
                            </a>    
                        </li>

                        <li class="menu">
                            <a href="{{route('articulos.index')}}" aria-expanded="false" class="dropdown-toggle"
                            <?php if (request()->is('articulos','articulos/*')) {
                                    echo 'data-active="true"';
                                } ?>  
                            >   
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                    <span>Artículos</span>
                                </div>
                            </a>    
                        </li>

                        <li class="menu">
                            <a href="{{route('usuarios.index')}}" aria-expanded="false" class="dropdown-toggle"
                            <?php if (request()->is('usuarios','usuarios/*')) {
                                    echo 'data-active="true"';
                                } ?>  
                            >   
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span>Usuarios</span>
                                </div>
                            </a>    
                        </li>

                        <li class="menu">
                            <a href="{{route('ingresos.index')}}" aria-expanded="false" class="dropdown-toggle"
                            <?php if (request()->is('ingresos','ingresos/*')) {
                                    echo 'data-active="true"';
                                } ?>  
                            >   
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    <span>Ingresos</span>
                                </div>
                            </a>    
                        </li>

                        <li class="menu ">
                            <a href="" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span> Cerrar Sesión</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>