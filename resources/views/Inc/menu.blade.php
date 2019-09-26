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
                    <i class="fa fa-folder-open"></i> <span>Propositions</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-server"></i> Categories
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-building"></i> Automobile
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{route('auto_add_path')}}"><i class="fa fa-plus"></i>Nouveau
                                            Souscripteur</a></li>
                                    <li>
                                        <a href="{{route('auto_list_path')}}"><i class="fa fa-list"></i>Liste
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="{{route('sauvegarde.bd')}}">
                                    <i class="fa fa-heart-o"></i> <span>Maladie</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-car"></i> <span>Assurance Voyage</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-plus-square"></i> <span>Multirisque</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-users"></i> <span>Responsabilite</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-truck"></i> <span>Transport</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-briefcase"></i> <span>Risques Techniques</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-user"></i> <span>Individuelle Accident</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-money"></i> <span>Caution Bancaire</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-handshake-o"></i> <span>Productions</span>
                   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                   </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-server"></i> Categories
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#"><i class="fa fa-building"></i> Automobile
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{route('auto_add_path')}}"><i class="fa fa-plus"></i>Nouveau
                                            Souscripteur</a></li>
                                    <li>
                                        <a href="{{route('auto_list_path')}}"><i class="fa fa-list"></i>Liste
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="{{route('sauvegarde.bd')}}">
                                    <i class="fa fa-heart-o"></i> <span>Maladie</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-car"></i> <span>Assurance Voyage</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-plus-square"></i> <span>Multirisque</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-users"></i> <span>Responsabilite</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-truck"></i> <span>Transport</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-briefcase"></i> <span>Risques Techniques</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-user"></i> <span>Individuelle Accident</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-money"></i> <span>Caution Bancaire</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-building"></i> Souscripteur
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add_souscripteur_path')}}"><i class="fa fa-plus"></i>Nouveau
                                    Souscripteur</a></li>
                            <li>
                                <a href="{{route('souscripteur_list_path')}}"><i class="fa fa-list"></i>Liste
                                </a>

                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-building-o"></i> Surccusale
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
                            <li>
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
                            <li>
                                <a href="{{route('list_assure_path')}}">
                                    <i class="fa fa-th"></i> <span>Liste</span>
                                </a>

                            </li>
                        </ul>
                    </li>
                    <li class="treeview">

                        <a href="#"><i class="fa fa-qq"></i> Polices
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('add_police_path')}}">
                                    <i class="fa fa-plus"></i> <span>Nouvelle police</span>
                                </a></li>
                            <li>
                                <a href="{{route('list_police_path')}}">
                                    <i class="fa fa-th"></i> <span>Liste</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-server"></i> Prestataire
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
                                <a href="{{route('compagnie_assure_list_path')}}">
                                    <i class="fa fa-plus"></i> <span>Categorie Assur&eacute;</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('add_cate_presta_path')}}">
                                    <i class="fa fa-plus"></i> <span>Categorie prestation</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('add_prestation_path')}}">
                                    <i class="fa fa-plus"></i> <span>Prestation</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('add_bareme_path')}}">
                                    <i class="fa fa-plus"></i> <span>Bar&ecirc;me Prestation</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th"></i> <span>Liste
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="#">
                                        <a href="{{route('all_categorie_path')}}">
                                            <i class="fa fa-th"></i> <span>Categories</span>
                                        </a>
                                    </li>
                                    <li class="#">
                                        <a href="{{route('all_prestation_path')}}">
                                            <i class="fa fa-th"></i> <span>Prestation</span>
                                        </a>
                                    </li>
                                    <li class="#">
                                        <a href="{{route('all_bareme_path')}}">
                                            <i class="fa fa-th"></i> <span>Tarifs/Bar&egrave;me</span>
                                        </a>
                                    </li>

                                </ul>
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
                    <i class="fa fa-frown-o"></i> <span> Sinistres</span>
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
                                    <i class="fa fa-th"></i> <span>Liste </span>
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
                                    <i class="fa fa-th"></i> <span>Liste</span>
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
                                    <i class="fa fa-th"></i> <span>Liste</span>
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
                                <a href="{{route('list_bonus_path')}}">
                                    <i class="fa fa-th"></i> <span>liste</span>
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
                                <a href="{{route('stat_assure_path')}}">
                                    <i class="fa fa-user-circle"></i> <span> Etats assur&eacute;s</span>
                                </a>

                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-share"></i> <span>Etats  sinistres</span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="#">
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i> <span>Par Police</span>
                                        </a>
                                    </li>
                                    <li class="#">
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i> <span>Par Assure</span>
                                        </a>
                                    </li>
                                    <li class="#">
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i> <span>Par prestataire</span>
                                        </a>
                                    </li>
                                    <li class="#">
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i> <span>Par Consommation</span>
                                        </a>
                                    </li>
                                    <li class="#">
                                        <a href="#">
                                            <i class="fa fa-dashboard"></i> <span>Par pathologie</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="#">
                                <a href="#">
                                    <i class="fa fa-paypal"></i> <span>Etats  paiements</span>
                                </a>

                            </li>

                        </ul>

                    </li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card"></i> <span>Encaissement</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu" hidden>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> Sauvegarde
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('sauvegarde.bd')}}">
                                    <i class="fa fa-cog"></i> <span>Base de donn&eacute;es</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-cog"></i> <span>Synchronisation</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Options avanc&eacute;es</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> Sauvegarde
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="{{route('sauvegarde.bd')}}">
                                    <i class="fa fa-cog"></i> <span>Base de donn&eacute;es</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-cog"></i> <span>Synchronisation</span>
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