<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/')}}"
                        aria-expanded="false">
                        <i class="fas fa-paw fa-2x"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/agendamento')}}"
                        aria-expanded="false">
                        <i class="far fa-clipboard-list-check fa-2x "></i>
                        <span class="hide-menu">Agendamento</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/clientes')}}"
                        aria-expanded="false">
                        <i class="fal fa-users fa-2x"></i>
                        <span class="hide-menu">Clientes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/produtos-e-servicos')}}"
                        aria-expanded="false">
                        <i class="fas fa-dog fa-2x"></i>
                        <span class="hide-menu">Produtos & Serviços</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/pacotes-e-promocoes')}}"
                        aria-expanded="false">
                    <i class="far fa-percentage"></i>
                        <span class="hide-menu">Pacotes & Promoções</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/financeiro')}}"
                        aria-expanded="false">
                        <i class="fal fa-comment-alt-dollar fa-2x"></i>
                        <span class="hide-menu">Financeiro</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/configuracoes')}}"
                        aria-expanded="false">
                        <i class="fal fa-user-cog fa-2x"></i>
                        <span class="hide-menu">Configurações</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>