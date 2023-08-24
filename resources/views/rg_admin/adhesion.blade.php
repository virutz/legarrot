@extends('adminsquelette')
@section('titre_page')
 Administration
@endsection

@section('position')
 Adhésions
@endsection

@section('contenu')
<div class="row">

        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModalexerciceadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Année exercice</button></a>
                    </section>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                        <table class="table table-hover dataTables-example" >
                          <thead>
                                <tr>                            
                                  <th>Année</th>
                                  <th>Action</th>                                      
                                </tr>
                          </thead>
                          <tbody>
                          @php $cpt = 1; @endphp
						@foreach ($exercices as $exercice)
                                <tr>                                     
                                  <td class="hidden-480" align="center">{{ $exercice->name }}</td>
                                  <td class="hidden-480" align="center">

                                    @if($exercice->status == 1)
                                    <button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
                                    @else
                                    <button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
                                    @endif
                                    &nbsp;
                                    <a title="Modifier Données" data-toggle="modal" data-target="#myModalexerciceupdate"><button class="btn btn-default">
                                    <span class="ace-icon fa fa-pencil"></span>
                                    </button></a>

                                    
                                    <div class="modal inmodal" id="myModalexerciceupdate" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
                                                </div>
                                                        <div class="modal-body" align="left">

                                                        <form action="" method="post"  name="form_exerciceupdate"  class="well form-horizontal" >
                                                        <input type="hidden" name="exerciceId" value="" class="form-control" readonly="readonly">

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année exercice</label>
                                                        <input name="exerciceName" value="" class="form-control" minlength="4" maxlength="4" onKeyUp="verif_integer(this)" required="required">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                        <select name="exerciceStatut"  class="chosen-select" required="required">
                                                        
                                                        <option value="1">ACTIF</option>
                                                        <option value="0">INACTIF</option>
                                                        </select>
                                                        </div>

                                                        <div class="modal-footer">

                                                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                                                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                                                        <button class="ladda-button btn btn-danger" type="submit" name="mod_exercice" data-style="expand-right">
                                                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Modifier</button>
                                                        </div>

                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                  </td>
                                </tr>
                                @endforeach
                          </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
            {!! $exercices->links() !!}

        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModalcotisationadhadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Droit Adhésion</button></a>
                    </section>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        
                        <table class="table table-hover dataTables-example" >
                          <thead>
                                <tr>                            
                                  <th>Année</th>
                                  <th>Montant (F)</th>
                                  <th>Action</th>                                      
                                </tr>
                          </thead>
                          <tbody>
                         
                                <tr>                                     
                                 <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center">
                                    
                                  
                                    <button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
                                    
                                    <button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
                                    
                                    &nbsp;
                                    <a title="Modifier Données" data-toggle="modal" data-target="#myModalcotisationadhupdate"><button class="btn btn-default">
                                    <span class="ace-icon fa fa-pencil"></span>
                                    </button></a>

                                    
                                    <div class="modal inmodal" id="myModalcotisationadhupdate" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
                                                </div>
                                                        <div class="modal-body" align="left">

                                                        <form action="" method="post"  name="cotisationadhupdate"  class="well form-horizontal" >
                                                        <input type="hidden" name="cotisationadhId" value="" class="form-control" readonly="readonly">
                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                                                        <select name="cotisationadhExerciceId"  class="chosen-select" required="required">
                                                        <option value="">Année Exercice</option>
                
                                                        </select>
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Droit Adhésion (F)</label>
                                                        <input name="cotisationadhMontant" value="" class="form-control" minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                        <select name="cotisationadhStatut"  class="chosen-select" required="required">
                                                        
                                                        <option value="1">ACTIF</option>
                                                        <option value="0">INACTIF</option>
                                                        </select>
                                                        </div>

                                                        <div class="modal-footer">

                                                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                                                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                                                        <button class="ladda-button btn btn-danger" type="submit" name="mod_cotisationadh" data-style="expand-right">
                                                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Modifier</button>
                                                        </div>

                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                  </td>
                                </tr>
                            
                            
                          </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModalcotisationanadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Cotisation Ann.</button></a>
                    </section>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        
                        <table class="table table-hover dataTables-example" >
                          <thead>
                                <tr>                            
                                  <th>Année</th>
                                  <th>Montant (F)</th>
                                  <th>Action</th>                                      
                                </tr>
                          </thead>
                          <tbody>
                             

                                <tr>                                     
                                 <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center">
                                    
                                    <button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>

                                    <button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>

                                    &nbsp;
                                    <a title="Modifier Données" data-toggle="modal" data-target="#myModalcotisationanupdate"><button class="btn btn-default">
                                    <span class="ace-icon fa fa-pencil"></span>
                                    </button></a>

                                    
                                    <div class="modal inmodal" id="myModalcotisationanupdate" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
                                                </div>
                                                        <div class="modal-body" align="left">

                                                        <form action="" method="post"  name="form_cotisationanupdate"  class="well form-horizontal" >
                                                        <input type="hidden" name="cotisationanId" value="" class="form-control" readonly="readonly">
                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                                                        <select name="cotisationanExerciceId"  class="chosen-select" required="required">
                                                        <option value="">Année Exercice</option>
                
                                                        </select>
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Cotisation Annuelle (F)</label>
                                                        <input name="cotisationanMontant" value="" class="form-control" minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                        <select name="cotisationanStatut"  class="chosen-select" required="required">
                                                        
                                                        <option value="1">ACTIF</option>
                                                        <option value="0">INACTIF</option>
                                                        </select>
                                                        </div>

                                                        <div class="modal-footer">

                                                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                                                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                                                        <button class="ladda-button btn btn-danger" type="submit" name="mod_cotisationan" data-style="expand-right">
                                                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Modifier</button>
                                                        </div>

                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                  </td>
                                </tr>
                             
                          </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModalcotisationmensadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Cotisation Mens.</button></a>
                    </section>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                       
                        <table class="table table-hover dataTables-example" >
                          <thead>
                                <tr>                            
                                  <th>Année</th>
                                  <th>Montant (F)</th>
                                  <th>Action</th>                                      
                                </tr>
                          </thead>
                          <tbody>
                            
                                <tr>                                     
                                 <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center">
                                    
                                    <button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>

                                    <button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>

                                    &nbsp;
                                    <a title="Modifier Données" data-toggle="modal" data-target="#myModalcotisationmensupdate"><button class="btn btn-default">
                                    <span class="ace-icon fa fa-pencil"></span>
                                    </button></a>

                                    
                                    <div class="modal inmodal" id="myModalcotisationmensupdate" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
                                                </div>
                                                        <div class="modal-body" align="left">

                                                        <form action="" method="post"  name="form_cotisationmensupdate"  class="well form-horizontal" >
                                                        <input type="hidden" name="cotisationmensId" value="" class="form-control" readonly="readonly">
                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                                                        <select name="cotisationmensExerciceId"  class="chosen-select" required="required">
                                                        <option value="">Année Exercice</option>
                
                                                        </select>
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Cotisation Mensuelle (F)</label>
                                                        <input name="cotisationmensMontant" value="" class="form-control" minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                        <select name="cotisationmensStatut"  class="chosen-select" required="required">
                                                        
                                                        <option value="1">ACTIF</option>
                                                        <option value="0">INACTIF</option>
                                                        </select>
                                                        </div>

                                                        <div class="modal-footer">

                                                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                                                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                                                        <button class="ladda-button btn btn-danger" type="submit" name="mod_cotisationmens" data-style="expand-right">
                                                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Modifier</button>
                                                        </div>

                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                  </td>
                                </tr>
                             

                          </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>


         <!-- Debut Enregistrement exercice -->
    <div class="modal inmodal" id="myModalexerciceadd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
                    <div class="modal-body" align="left">

                    <form action="{{ route('exerciceadd') }}" method="GET"  name="form_exerciceadd" class="well form-horizontal" >

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année exercice</label>
                        <input name="name" class="form-control"  minlength="4" maxlength="4" onKeyUp="verif_integer(this)" required="required">
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                        <select name="status"  class="chosen-select" required="required">
                        <option value="1">ACTIF</option>
                        <option value="0">INACTIF</option>
                        </select>
                        </div>

                        <div class="modal-footer">

                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                        <button class="ladda-button btn btn-success" type="submit" name="ins_exercice" data-style="expand-right">
                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
                        </div>

                    </form>

                    </div>
            </div>
        </div>
    </div>
    
    <!-- Fin Enregistrement Droit Adhésion -->

    <div class="modal inmodal" id="myModalcotisationadhadd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
                    <div class="modal-body" align="left">

                    <form action="{{ route('cotisationadhadd') }}" method="GET"  name="form_cotisationadhadd" class="well form-horizontal" >

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                        <select name="exercice_id"  class="chosen-select" required="required">
                        <option value="">Selection Année</option>
                        @foreach ($exercices as $exercice)
							<option value="{{ $exercice->id }}">{{ $exercice->name }}</option> 
						@endforeach 
                        
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Droit Adhésion (F)</label>
                        <input name="name" class="form-control"  minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                        <select name="status"  class="chosen-select" required="required">
                        <option value="1">ACTIF</option>
                        <option value="0">INACTIF</option>
                        </select>
                        </div>

                        <div class="modal-footer">

                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                        <button class="ladda-button btn btn-success" type="submit" name="ins_cotisationadh" data-style="expand-right">
                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
                        </div>

                    </form>

                    </div>
            </div>
        </div>
    </div>

    <!-- Fin Enregistrement Cotisation Mensuelle -->

    <div class="modal inmodal" id="myModalcotisationmensadd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                    <div class="modal-body" align="left">

                    <form action="" method="post"  name="form_cotisationmensadd"  class="well form-horizontal" >

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                        <select name="cotisationmensExerciceId"  class="chosen-select" required="required">
                        <option value="">Selection Année</option>
                        @foreach ($exercices as $exercice)
							<option value="{{ $exercice->id }}">{{ $exercice->name }}</option> 
						@endforeach 
                        
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Cotisation Mensuelle (F)</label>
                        <input name="cotisationmensMontant" class="form-control"  minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                        <select name="cotisationmensStatut"  class="chosen-select" required="required">
                        <option value="1">ACTIF</option>
                        <option value="0">INACTIF</option>
                        </select>
                        </div>

                        <div class="modal-footer">

                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                        <button class="ladda-button btn btn-success" type="submit" name="ins_cotisationmens" data-style="expand-right">
                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
                        </div>

                    </form>

                    </div>
            </div>
        </div>
    </div>

     <!-- Fin Enregistrement Droit Adhésion -->

    <div class="modal inmodal" id="myModalcotisationanadd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
                    <div class="modal-body" align="left">

                    <form action="" method="post"  name="form_cotisationanadd" class="well form-horizontal" >

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                        <select name="cotisationanExerciceId"  class="chosen-select" required="required">
                        <option value="">Selection Année</option>
                        @foreach ($exercices as $exercice)
							<option value="{{ $exercice->id }}">{{ $exercice->name }}</option> 
						@endforeach 
                        
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Cotisation Annuelle (F)</label>
                        <input name="cotisationanMontant" class="form-control"  minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                        <select name="cotisationanStatut"  class="chosen-select" required="required">
                        <option value="1">ACTIF</option>
                        <option value="0">INACTIF</option>
                        </select>
                        </div>

                        <div class="modal-footer">

                        <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                        <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                        <button class="ladda-button btn btn-success" type="submit" name="ins_cotisationan" data-style="expand-right">
                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
                        </div>

                    </form>

                    </div>
            </div>
        </div>
    </div>

 

@endsection
