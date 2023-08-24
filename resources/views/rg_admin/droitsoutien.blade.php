@extends('adminsquelette')
@section('titre_page')
 Finance
@endsection

@section('position')
 Droit Soutien
@endsection


@section('contenu')
<div class="row">

<div class="col-lg-2">
</div>
<div class="col-lg-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModalsoutienadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Droit Soutien</button></a>
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
                                  <th>Libéllé</th>
                                  <th>Montant (F)</th>
                                  <th>Action</th>                                      
                                </tr>
                          </thead>
                          <tbody>
                          @php $cpt = 1; @endphp
						@foreach ($soutiens as $soutien)
                                <tr>                                     
                                 <td class="hidden-480" align="center">{{ $soutien->soutienExercice->name }}</td>
                                  <td class="hidden-480">{{ $soutien->name }}</td>
                                  <td class="hidden-480" align="center">{{ $soutien->montant }}</td>
                                  <td class="hidden-480" align="center">
                                    
                                  @if($soutien->status == 1)
                                    <button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
                                    @else
                                    <button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
                                    @endif
                                    &nbsp;
                                    <a title="Modifier Données" data-toggle="modal" data-target="#myModalsoutienupdate{{ $soutien->id }}"><button class="btn btn-default">
                                    <span class="ace-icon fa fa-pencil"></span>
                                    </button></a>

                                    
                                    <div class="modal inmodal" id="myModalsoutienupdate{{ $soutien->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
                                                </div>
                                                        <div class="modal-body" align="left">

                                                        <form action="{{ route('droitsoutienupdate', $soutien->id) }}" method="GET"  name="soutienupdate"  class="well form-horizontal" >
                                                    @csrf 
												    @method('PUT')
                                                        
                                                        <div class="form-group"><font color="white"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                                                       
                                                        <input name="exercice_id" value="{{ $soutien->soutienExercice->name }}" class="form-control" minlength="4" maxlength="11" readonly="readonly">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Libellé</label>
                                                        <input name="name" value="{{ $soutien->name }}" class="form-control" minlength="4" onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Droit Soutien (F)</label>
                                                        <input name="montant" value="{{ $soutien->montant }}" class="form-control" minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
                                                        </div>

                                                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                        <select name="status"  class="chosen-select" required="required">
                                                        
                                                        @if($soutien->status == 1)
                                                        <option value="1">ACTIF</option>
                                                        <option value="0">INACTIF</option>
                                                        @else
                                                        <option value="0">INACTIF</option>
                                                        <option value="1">ACTIF</option>
                                                        @endif
                                                        </select>
                                                        </div>

													<div class="modal-footer">

													<button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
													<i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

													<input type="hidden" name="hidden_id" value="{{ $soutien->id }}" />

                                                        <button class="ladda-button btn btn-danger" type="submit"  data-style="expand-right">
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
        </div>
        {!! $soutiens->links() !!}

    <div class="modal inmodal" id="myModalsoutienadd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
                    <div class="modal-body" align="left">

                    <form action="{{ route('droitsoutienadd') }}" method="GET"  name="form_soutienadd" class="well form-horizontal" >

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
                        <select name="exercice_id"  class="chosen-select" required="required">
                        <option value="">Selection Année</option>
                        @foreach ($exercices as $exercice)
							<option value="{{ $exercice->id }}">{{ $exercice->name }}</option> 
						@endforeach 
                        
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Libellé</label>
                        <input name="name"  class="form-control" minlength="4" onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required">
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Montant Droit Soutien (F)</label>
                        <input name="montant" class="form-control"  minlength="4" maxlength="11" onKeyUp="verif_integer(this)" required="required">
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

                        <button class="ladda-button btn btn-success" type="submit" data-style="expand-right">
                        <i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
                        </div>

                    </form>

                    </div>
            </div>
        </div>
    </div>


<div class="col-lg-2">
</div>
    
@endsection
