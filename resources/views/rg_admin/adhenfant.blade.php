@extends('adminsquelette')
@section('titre_page')
 Inscription
@endsection

@section('position')
 Adhérents
@endsection

@section('contenu')
<!-- Début Enregistrement Adhérent Enfant -->
<div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModaltuteur"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Adhérent </button></a>
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
								  <th>Sexe</th>
								  <th>Date & Lieu Nais.</th>
                                  <th>Contacts</th>                       
    
                                  <th>Adh. Tuteurs</th>
                                  <th>Actions</th>                                      
                                </tr>
                          </thead>
                          <tbody>
						  @php $cpt = 1; @endphp
							@foreach ($adhenfants as $adhenfant)

                                <tr>                                     
                                  <td class="hidden-480" title="">ADH-0{{ $adhenfant->adhenfantAdhtuteur->id }}/{{ $adhenfant->id }}</td>
                                  <td class="hidden-480">{{ $adhenfant->adhname }}</td>
                                  <td class="hidden-480">{{ $adhenfant->adhnamelast }}</td>
								  <td class="hidden-480">@if($adhenfant->adhsexe == 1) H @else F @endif</td>
								  <td class="hidden-480" align="center" >{{ $adhenfant->adhdatenais }} </br>{{ $adhenfant->adhlieunais }}</td>
                                  <td class="hidden-480" align="center">{{ $adhenfant->adhphone1 }} </br>{{ $adhenfant->adhphone2 }}</td>
                                  <td class="hidden-480" >{{ $adhenfant->adhenfantAdhtuteur->adhtname }} {{ $adhenfant->adhenfantAdhtuteur->adhtnamelast }}</td>
                                  <td class="hidden-480" align="center">
									
								  @if($adhenfant->status == 1)
									<button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
									@else
									<button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
									@endif
									&nbsp;
									
									<a title="Modifier Données" data-toggle="modal" data-target="#myModaluserupdate{{ $adhenfant->id }}"><button class="btn btn-default">
									<span class="ace-icon fa fa-pencil"></span>
									</button></a>

									<div class="modal inmodal" id="myModaluserupdate{{ $adhenfant->id }}" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content animated bounceInRight">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
												</div>
													<div class="modal-body" align="left">

											<form action="{{ route('adhenfantupdate') }}" method="GET"  name="form_useradd" class="well form-horizontal" >

                                            <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
												<select name="exercice_id" class="chosen-select" required="required">
												<option value="{{ $adhenfant->adhenfantExercice->id }}">{{ $adhenfant->adhenfantExercice->name }}</option>
												@foreach ($exercices as $exercice)
													<option value="{{ $exercice->id }}">{{ $exercice->name }}</option> 
												@endforeach 
												</select>
											</div>

											<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur</label>
												<select name="adhtuteur_id"  class="chosen-select" required="required">
												<option value="{{ $adhenfant->adhenfantAdhtuteur->id }}">{{ $adhenfant->adhenfantAdhtuteur->adhtname }} {{ $adhenfant->adhenfantAdhtuteur->adhtnamelast }}</option>
												@foreach ($adhtuteurs as $adhtuteur)
													<option value="{{ $adhtuteur->id }}">{{ $adhtuteur->adhtname }} {{ $adhtuteur->adhtnamelast }}</option> 
												@endforeach 
												</select>
											</div>
                                            
                                            <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Date Début</label>
												<input type="date"  name="adhdatedebut" value="{{ $adhenfant->adhdatedebut }}" class="form-control"  required="required" >
											</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Nom</label>
												<input  name="adhname" value="{{ $adhenfant->adhname }}"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Prénom</label>
												<input  name="adhnamelast"  value="{{ $adhenfant->adhnamelast }}" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Sexe</label>
												<select name="adhsexe" class="chosen-select" required="required">

												@if($adhenfant->adhsexe == 1)
												<option value="1">HOMME</option>
												<option value="0">FEMME</option>
												@else
												<option value="0">FEMME</option>
												<option value="1">HOMME</option>
												@endif

												</select>
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Date Naissance</label>
												<input type="date"  name="adhdatenais" value="{{ $adhenfant->adhdatenais }}" class="form-control"  required="required" >
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Lieu Naissance</label>
												<input  name="adhlieunais" value="{{ $adhenfant->adhlieunais }}"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Téléphone #1</label>
												<input name="adhphone1" class="form-control" pattern="[0-9]{13}" value="{{ $adhenfant->adhphone1 }}" onKeyUp="verif_integer(this)" required="required">
												</div>
												
												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Téléphone #2</label>
												<input name="adhphone2" class="form-control" pattern="[0-9]{13}" value="{{ $adhenfant->adhphone2 }}" onKeyUp="verif_integer(this)" required="required">
												</div>

												<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
												<select name="status"  class="chosen-select" required="required">
												@if($adhenfant->status == 1)
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

												<input type="hidden" name="hidden_id" value="{{ $adhenfant->id }}" />

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
    {!! $adhenfants->links() !!}    
	<div class="modal inmodal" id="myModaltuteur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
					<div class="modal-body" align="left">

					<form action="{{ route('adhenfantadd') }}" method="GET"  name="form_useradd" class="well form-horizontal" >
					
                    <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année Exercice</label>
						<select name="exercice_id" class="chosen-select" required="required">
						<option value="">Selection Année</option>
						@foreach ($exercices as $exercice)
                            <option value="{{ $exercice->id }}">{{ $exercice->name }}</option> 
                        @endforeach 
						</select>
						</div>

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur</label>
                        <select name="adhtuteur_id"  class="chosen-select" required="required">
                        <option value="">Selection Adhérent Tuteur</option>
                        @foreach ($adhtuteurs as $adhtuteur)
                            <option value="{{ $adhtuteur->id }}">{{ $adhtuteur->adhtname }} {{ $adhtuteur->adhtnamelast }}</option> 
                        @endforeach 
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Date Début</label>
                            <input type="date"  name="adhdatedebut"  class="form-control"  required="required" >
                        </div>
						

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Nom</label>
						<input  name="adhname" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Prénom</label>
						<input  name="adhnamelast"  placeholder=" Saisir le ou les prenom(s)" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Sexe</label>
						<select name="adhsexe" class="chosen-select" required="required">
						<option value="">*</option>
                        <option value="1">HOMME</option>
                        <option value="0">FEMME</option>
						
						</select>
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Date Naissance</label>
						<input type="date"  name="adhdatenais"  class="form-control"  required="required" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Lieu Naissance</label>
						<input  name="adhlieunais" placeholder=" Saisir lieu de Naissance"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Téléphone #1</label>
						<input name="adhphone1" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>
						
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Téléphone #2</label>
						<input name="adhphone2" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
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
    
	<!-- Fin Enregistrement Adhérent Enfant -->
@endsection
