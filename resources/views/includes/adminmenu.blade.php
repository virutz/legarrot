<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <h5>
                           <img alt="image" src="pictures/logomag.jpg" class="img-circle" width="25" height="25" />
                           <a href="{{ route('dashboard') }}">
                           <a href="{{ route('dashboard') }}"><font color="white">&nbsp;<b><small>Mutuelle Assurance</small></b></font></a>
                           <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="text-muted text-xs block">

                              <div align="center">
                                &nbsp;<i class="fa fa-user-secret text-info"></i>&nbsp;Webmaster&nbsp;</span>
                              </div>

                           </a>
                        </h5>
                    </div>
                           <div class="logo-element">
                                <a href="{{ route('dashboard') }}">
                                    <img alt="image" src="pictures/logomag.jpg" class="img-circle" width="35" height="35" />
                                </a>
                           </div>
                     
                </li>
                         <li>
                            <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Administration</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">

                                <li><a href="{{ route('entreprise') }}" >Structure</a></li>
                                <li><a href="{{ route('region') }}" >Régions</a></li>
                                <li><a href="{{ route('section') }}" >Sections</a></li>
                                <li><a href="{{ route('gerant') }}" >Gérants</a></li>
                                
                            </ul>
                         </li>
                         <li>
                            <a href="#"><i class="fa fa-euro"></i> <span class="nav-label">Finance</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                            
                                <li><a href="{{ route('exercice') }}" >Exercice Annuel</a></li>
                                <li><a href="{{ route('droitadhesion') }}" >Droit Adhésion</a></li>
                                <li><a href="{{ route('droitannuel') }}" >Droit Annuel</a></li>
                                <li><a href="{{ route('droitmensuel') }}" >Droit Mensuel</a></li>
                                <li><a href="{{ route('droitsoutien') }}" >Droit Soutien</a></li>
                            </ul>
                         </li>
                         <li>
                            <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Inscription</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ route('adhtuteur') }}" >Tuteurs</a></li>
                                <li><a href="{{ route('adhbeneficiaire') }}" >Bénéficiaires</a></li>
                                <li><a href="{{ route ('adhenfant') }}" >Adhérents</a></li>
                            </ul>
                         </li>

            </ul>
    </div>
</nav>