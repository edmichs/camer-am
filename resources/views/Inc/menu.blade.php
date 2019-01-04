<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/default.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">

                <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center">MENU</li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Gestion de Production</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-building"></i> Souscripteur
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add_souscripteur_path')}}"><i class="fa fa-circle-o"></i>Nouveau
                                    Souscripteur</a></li>
                            <li >
                                <a href="{{route('souscripteur_list_path')}}"><i class="pull-right-container"></i>Liste
                                </a>

                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Surccusale
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add_surccusale_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouvelle Surccusale</span>
                                </a></li>
                            <li>
                                <a href="{{route('list_surccusale_path')}}">
                                    <i class="fa fa-th"></i> <span>Liste</span>
                                </a>
                                ty
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-clipboard"></i> Compagnie
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('compagnie_add_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouvelle Comapagnie</span>
                                </a></li>
                            <li >
                                <a href="{{route('compagnie_list_path')}}">
                                    <i class="fa fa-th"></i> <span>Liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i>
                            <span>Assur&eacute;s</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add_assure_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouvel Assure</span>
                                </a></li>
                            <li>
                                <a href="{{route('incorporation_assure_path')}}">
                                    <i class="fa fa-plus"></i> <span>Incorporation en cours</span>
                                </a>

                            </li>
                            <li >
                                <a href="{{route('list_assure_path')}}">
                                    <i class="fa fa-th"></i> <span>Liste</span>
                                </a>

                            </li>
                        </ul>
                    </li>
                    <li class="treeview">

                        <a href="#"><i class="fa fa-circle-o"></i> Polices
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add_police_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouvelle police</span>
                                </a></li>
                            <li >
                                <a href="">
                                    <i class="fa fa-repeat"></i> <span>Renouvellement</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Prestataire
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_prestataire_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouveau prestataire</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('list_prestataire_path')}}">
                                    <i class="fa fa-plus"></i> <span>Liste </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-handshake-o"></i> Tarifs
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_surccusale_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouveau Tarif</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('add_surccusale_path')}}">
                                    <i class="fa fa-plus"></i> <span>Liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-snowflake-o"></i> Exercices
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_exercice_path')}}">
                                    <i class="fa fa-plus"></i> <span>Saisir Nouvel Exercice</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('list_exercice_path')}}">
                                    <i class="fa fa-plus"></i> <span>Exercice en cours </span>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Gestion de Sinistre</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-handshake-o"></i> BPC
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_bpc_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouveau bpc</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('list_bpc_path')}}">
                                    <i class="fa fa-plus"></i> <span>Liste </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"> <i class="fa fa-balance-scale"></i>
                            <span>Decompte</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_decompte_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouveau decompte</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('list_decompte_path')}}">
                                    <i class="fa fa-plus"></i> <span>Liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-handshake-o"></i>
                            <span>Remboursements</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_remboursement_path')}}">
                                    <i class="fa fa-plus"></i> <span>Validation Remboursement</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('list_remboursement_path')}}">
                                    <i class="fa fa-plus"></i> <span>Liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-handshake-o"></i>
                            <span>Bonus/Malus</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('add_bonus_path')}}">
                                    <i class="fa fa-plus"></i> <span>Saisir </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('add_surccusale_path')}}">
                                    <i class="fa fa-plus"></i> <span>liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-dashboard"></i> Statistiques
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="#">
                                <a href="#">
                                    <i class="fa fa-plus"></i> <span>Nombre d'assurés / Souscripteur</span>
                                </a>
                            </li>

                            <li class="#">
                                <a href="#">
                                    <i class="fa fa-th"></i> <span>Liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>