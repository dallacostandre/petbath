@component('dashboard.componentes.header')@endcomponent
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Editar Perfil</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/configuracoes')}}">Configurações</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3">
                <div class="card">
                    <div class="card-body">
                        <center class="mt-4"> 
                            <img src="../../assets/images/users/5.jpg"
                                class="rounded-circle" width="150" />
                            <h4 class="card-title mt-2">Hanna Gover</h4>
                            <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="mdi mdi-account-network"></i>
                                        <font class="font-medium">254</font>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link"><i
                                            class="mdi mdi-camera"></i>
                                        <font class="font-medium">54</font>
                                    </a></div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6>hannagover@gmail.com</h6> <small class="text-muted pt-4 db">Phone</small>
                        <h6>+91 654 784 547</h6> <small class="text-muted pt-4 db">Address</small>
                        <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                        <div class="map-box">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                                width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted pt-4 db">Social Profile</small>
                        <br />
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-youtube-play"></i></button>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2">
                            <div class="form-group">
                                <label class="col-md-12">Nome Fantasia</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">CNPJ</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com"
                                        class="form-control form-control-line" name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Responsável</label>
                                <div class="col-md-12">
                                    <input type="password" value="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="123 456 7890"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Telefone Fixo</label>
                                <div class="col-md-12">
                                    <input class="form-control form-control-line"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Whats App</label>
                                <div class="col-md-12">
                                    <input class="form-control form-control-line"></input>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>CEP</label>
                                    <input type="text" class="form-control cep" id="cep" name="cep"
                                        placeholder="Insira o CEP" value="@if (isset($endereco)) {{ $endereco[0]->cliente_cep }} @endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_rua }} @endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>N°</label>
                                    <input type="text" class="form-control numero" id="numero" name="numero"
                                        value="@if (isset($endereco)) {{ $endereco[0]->cliente_numero }} @endif" placeholder="Numero" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        placeholder="Ex:Casa/Apto" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success botao-padrao float-end">
                                        Atualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="pt-3 pb-3 ">
                            <h4>Alterar de Senha de Acesso</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Senha Atual</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        placeholder="Digite a sua senha atual" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Nova Senha</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        placeholder="Digite sua senha nova" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Confirme Nova Senha</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento"
                                        placeholder="Confirme sua senha nova" value="@if (isset($endereco)) {{ $endereco[0]->cliente_complemento }} @endif"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success botao-padrao float-end"
                                        id="salvarCliente">
                                        Alterar Senha
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @component('dashboard.componentes.footer')@endcomponent

    </html>
