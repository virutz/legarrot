@extends('adminsquelette')
@section('titre_page')
 Inscription
@endsection

@section('position')
 Adhérents Bénéficiaires
@endsection

@section('contenu')
<!-- Début Enregistrement Adhérent Tuteur -->
<div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModaltuteur"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Adhérent Bénéficiaire</button></a>
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
								<th>Matricule</th>                           
                                  <th>Nom</th>
                                  <th>Prénoms</th>
								  <th>Sexe et Parenté</th>
								  <th>Date & Lieu Nais.</th>
                                  <th>Contacts</th>                       
    
                                  <th>Adh. Tuteurs</th>
                                  <th>Actions</th>                                      
                                </tr>
                          </thead>
                          <tbody>
						  @php $cpt = 1; @endphp
							@foreach ($adhbeneficiaires as $adhbeneficiaire)

                                <tr>                                     
                                  <td class="hidden-480" title="">BEN-0{{ $adhbeneficiaire->adhbeneficiaireAdhtuteur->id }}/{{ $adhbeneficiaire->id }}</td>
                                  <td class="hidden-480">{{ $adhbeneficiaire->adhbname }}</td>
                                  <td class="hidden-480">{{ $adhbeneficiaire->adhbnamelast }}</td>
								  <td class="hidden-480">@if($adhbeneficiaire->adhbsexe == 1) H @else F @endif | {{ $adhbeneficiaire->adhbeneficiaireParente->name }}</td>
								  <td class="hidden-480" align="center" >{{ $adhbeneficiaire->adhbdatenais }} </br>{{ $adhbeneficiaire->adhblieunais }}</td>
                                  <td class="hidden-480" align="center">{{ $adhbeneficiaire->adhbphone1 }} </br>{{ $adhbeneficiaire->adhbphone2 }}</td>
                                  <td class="hidden-480" >{{ $adhbeneficiaire->adhbeneficiaireAdhtuteur->adhtname }} {{ $adhbeneficiaire->adhbeneficiaireAdhtuteur->adhtnamelast }}</td>
                                  <td class="hidden-480" align="center">
									
								  @if($adhbeneficiaire->status == 1)
									<button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
									@else
									<button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
									@endif
									&nbsp;
									
									<a title="Modifier Données" data-toggle="modal" data-target="#myModaluserupdate{{ $adhbeneficiaire->id }}"><button class="btn btn-default">
									<span class="ace-icon fa fa-pencil"></span>
									</button></a>

									<div class="modal inmodal" id="myModaluserupdate{{ $adhbeneficiaire->id }}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content animated bounceInRight">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
												</div>
													<div class="modal-body" align="left">

											<form action="{{ route('adhbeneficiaireupdate') }}" method="GET"  name="form_useradd" class="well form-horizontal" >
						
											<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur</label>
												<select name="adhtuteur_id"  class="chosen-select" required="required">
												<option value="{{ $adhbeneficiaire->adhbeneficiaireAdhtuteur->id }}">{{ $adhbeneficiaire->adhbeneficiaireAdhtuteur->adhtname }} {{ $adhbeneficiaire->adhbeneficiaireAdhtuteur->adhtnamelast }}</option>
												@foreach ($adhtuteurs as $adhtuteur)
													<option value="{{ $adhtuteur->id }}">{{ $adhtuteur->adhtname }} {{ $adhtuteur->adhtnamelast }}</option> 
												@endforeach 
												</select>
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Lien Parenté</label>
												<select name="parente_id" class="chosen-select" required="required">
												<option value="{{ $adhbeneficiaire->adhbeneficiaireParente->id }}">{{ $adhbeneficiaire->adhbeneficiaireParente->name }}</option>
												@foreach ($parentes as $parente)
													<option value="{{ $parente->id }}">{{ $parente->name }}</option> 
												@endforeach 
												</select>
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Bénéficiaire Nom</label>
												<input  name="adhbname" value="{{ $adhbeneficiaire->adhbname }}"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Bénéficiaire Prénom</label>
												<input  name="adhbnamelast"  value="{{ $adhbeneficiaire->adhbnamelast }}" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Bénéficiaire Sexe</label>
												<select name="adhbsexe" class="chosen-select" required="required">

												@if($adhbeneficiaire->adhbsexe == 1)
												<option value="1">HOMME</option>
												<option value="0">FEMME</option>
												@else
												<option value="0">FEMME</option>
												<option value="1">HOMME</option>
												@endif

												</select>
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Date Naissance</label>
												<input type="date"  name="adhbdatenais" value="{{ $adhbeneficiaire->adhbdatenais }}" class="form-control"  required="required" >
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Lieu Naissance</label>
												<input  name="adhblieunais" value="{{ $adhbeneficiaire->adhblieunais }}"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Téléphone #1</label>
												<input name="adhbphone1" class="form-control" pattern="[0-9]{13}" value="{{ $adhbeneficiaire->adhbphone1 }}" onKeyUp="verif_integer(this)" required="required">
												</div>
												
												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Téléphone #2</label>
												<input name="adhbphone2" class="form-control" pattern="[0-9]{13}" value="{{ $adhbeneficiaire->adhbphone2 }}" onKeyUp="verif_integer(this)" required="required">
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Type Pièce Ident.</label>
												<select name="pidentite_id" class="chosen-select" required="required">
												<option value="{{ $adhbeneficiaire->adhbeneficiairePidentite->id }}">{{ $adhbeneficiaire->adhbeneficiairePidentite->name}}</option>
												@foreach ($pidentites as $pidentite)
													<option value="{{ $pidentite->id }}">{{ $pidentite->name }}</option> 
												@endforeach 
												</select>
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur N&deg; Pièce Ident.</label>
												<input name="adhbpnumero"  value="{{ $adhbeneficiaire->adhbpnumero }}" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();">
												</div>
												
												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
												<select name="status"  class="chosen-select" required="required">
												@if($adhbeneficiaire->status == 1)
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

												<input type="hidden" name="hidden_id" value="{{ $adhbeneficiaire->id }}" />

												<button class="ladda-button btn btn-danger" type="submit" data-style="expand-right">
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
    </div>
    {!! $adhbeneficiaires->links() !!}    
	<div class="modal inmodal" id="myModaltuteur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
					<div class="modal-body" align="left">

					<form action="{{ route('adhbeneficiaireadd') }}" method="GET"  name="form_useradd" class="well form-horizontal" >
						

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur</label>
                        <select name="adhtuteur_id"  class="chosen-select" required="required">
                        <option value="">Selection Adhérent Tuteur</option>
                        @foreach ($adhtuteurs as $adhtuteur)
                            <option value="{{ $adhtuteur->id }}">{{ $adhtuteur->adhtname }} {{ $adhtuteur->adhtnamelast }}</option> 
                        @endforeach 
                        </select>
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Lien Parenté</label>
						<select name="parente_id" class="chosen-select" required="required">
						<option value="">Selection Parenté</option>
						@foreach ($parentes as $parente)
                            <option value="{{ $parente->id }}">{{ $parente->name }}</option> 
                        @endforeach 
						</select>
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Nom</label>
						<input  name="adhbname" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Prénom</label>
						<input  name="adhbnamelast"  placeholder=" Saisir le ou les prenom(s)" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Sexe</label>
						<select name="adhbsexe" class="chosen-select" required="required">
						<option value="">*</option>
                        <option value="1">HOMME</option>
                        <option value="0">FEMME</option>
						
						</select>
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Date Naissance</label>
						<input type="date"  name="adhbdatenais"  class="form-control"  required="required" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Lieu Naissance</label>
						<input  name="adhblieunais" placeholder=" Saisir lieu de Naissance"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Téléphone #1</label>
						<input name="adhbphone1" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>
						
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Téléphone #2</label>
						<input name="adhbphone2" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur Type Pièce Ident.</label>
                        <select name="pidentite_id" class="chosen-select" required="required">
						<option value="">Selection Type Pièce</option>
						@foreach ($pidentites as $pidentite)
							<option value="{{ $pidentite->id }}">{{ $pidentite->name }}</option> 
						@endforeach 
						</select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur N&deg; Pièce Ident.</label>
                        <input name="adhbpnumero"  placeholder=" Saisir Pièce Ident." class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();">
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
    
	<!-- Fin Enregistrement Adhérent Bénéficiaire -->
@endsection
