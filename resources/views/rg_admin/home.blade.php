@extends('adminsquelettehome')
@section('titre_page')
Bienvenue dans votre Module de Gestion
@endsection

@section('position')
    
@endsection

@section('contenu')
<div class="row">
    <div class="col-lg-4" title="Point Annuel">
    <div class="widget style1 lazur-bg">
        <div class="row">
            <div class="col-4">
              <span>Total</span>
                <i class="fa fa-bank fa-5x"></i>
                 Souscriptions
            </div>
            <div class="col-8 text-right">
                <span>XOF</span>
                <h2 class="font-bold">0</h2>
                <span>Adhérents</span>
                 <h3>{{ $cptadhtuteurv + $cptadhenfantv }}</h3>
            </div>
        </div>
    </div>
    </div>


    <div class="col-lg-4" title="Point Annuel">
    <div class="widget style1 navy-bg">
        <div class="row">
            <div class="col-4">
              <span>Total</span>
                <i class="fa fa-home fa-5x"></i>
                 Versements
            </div>
            <div class="col-8 text-right">
                <span>XOF</span>
                <h2 class="font-bold">0</h2> 
                <span>Taux</span>
                 <h3>0%</h3>
            </div>
        </div>
    </div>
    </div>

    <div class="col-lg-4" title="Point Annuel">
    <div class="widget style1 red-bg">
        <div class="row">
            <div class="col-4">
              <span>Total</span>
                <i class="fa fa-cogs fa-5x"></i>
                 Reste
            </div>
            <div class="col-8 text-right">
            <span>XOF</span>
            <h2 class="font-bold">0</h2>
                <span>Soutien</span>
                <h3>0</h3>
            </div>
        </div>
    </div>
    </div>
</div>
<hr>

<div class="row">
<div class="col-lg-2" title="Nombre de Regions">
    <div class="widget style1 lazur-bg">
        <div class="row vertical-align">
            <div class="col-3">
                <i class="fa fa-globe fa-3x"></i>
            </div>
            <div class="col-9 text-right">
                <h2 class="font-bold">{{ $cptregion }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2" title="Nombre de Sections">
    <div class="widget style1 lazur-bg">
        <div class="row vertical-align">
            <div class="col-3">
                <i class="fa fa-map-signs fa-3x"></i>
            </div>
            <div class="col-9 text-right">
                <h2 class="font-bold">{{ $cptsection }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2" title="Nombre Adhérents Tuteurs">
    <div class="widget style1 navy-bg">
        <div class="row vertical-align">
            <div class="col-3">
                <i class="fa fa-user-secret fa-3x"></i>
            </div>
            <div class="col-9 text-right">
                <h2 class="font-bold">{{ $cptadhtuteurv }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2" title="Nombre Adhérents">
    <div class="widget style1 navy-bg">
        <div class="row vertical-align">
            <div class="col-3">
                <i class="fa fa-user fa-3x"></i>
            </div>
            <div class="col-9 text-right">
                <h2 class="font-bold">{{ $cptadhenfantv }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2" title="Nombre Décès Adhérents Tuteurs">
    <div class="widget style1 red-bg">
        <div class="row vertical-align">
            <div class="col-3">
                <i class="fa fa-shield fa-3x"></i>
            </div>
            <div class="col-9 text-right">
                <h2 class="font-bold">{{ $cptadhtuteurm }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2" title="Nombre Décès Adhérents">
    <div class="widget style1 yellow-bg">
        <div class="row vertical-align">
            <div class="col-3">
                <i class="fa fa-shield fa-3x"></i>
            </div>
            <div class="col-9 text-right">
                <h2 class="font-bold">{{ $cptadhenfantm }}</h2>
            </div>
        </div>
    </div>
</div>
</div>
<hr>

@endsection
