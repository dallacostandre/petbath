<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.index') }}"
                        aria-expanded="false">
                        <i class="fas fa-paw fa-2x"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agendamento.index') }}"
                        aria-expanded="false">
                        <i class="far fa-clipboard-list-check fa-2x "></i>
                        <span class="hide-menu">Agendamento</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('cliente.index') }}"
                        aria-expanded="false">
                        <i class="fal fa-users fa-2x"></i>
                        <span class="hide-menu">Clientes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('produto.index') }}" aria-expanded="false">
                        <i class="fas fa-dog fa-2x"></i>
                        <span class="hide-menu">Produtos</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('servico.index') }}" aria-expanded="false">
                        <i class="fas fa-shower"></i>
                        <span class="hide-menu">Serviços</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('pacotes.promocionais.index') }}" aria-expanded="false">
                        <i class="far fa-percentage"></i>
                        <span class="hide-menu">Pacotes Promocional</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('financeiro.index') }}"
                        aria-expanded="false">
                        <i class="fal fa-comment-alt-dollar fa-2x"></i>
                        <span class="hide-menu">Financeiro</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('caixa.index') }}"
                        aria-expanded="false">
                        <i class="me-2 mdi mdi-cash-multiple"></i>
                        <span class="hide-menu">Caixa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('configuracoes.index') }}"
                        aria-expanded="false">
                        <i class="fal fa-user-cog fa-2x"></i>
                        <span class="hide-menu">Configurações</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="float-left" style="position: static">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit"> {{ __('Sair') }}</button>
                </div>
            </form>
        </div>
    </div>
</aside>
