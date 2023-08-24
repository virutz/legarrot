@extends('adminsquelette')
@section('titre_page')
 Administration
@endsection

@section('position')
 Configurations
@endsection

@section('contenu')

@if ($message = Session::get('success'))
<div class="alert alert-success">
   <p>{{ $message }}</p>
</div>
@endif

<!-- Debut Enregistrement Entreprise -->
<div class="row">
	<div class="col-lg-12">
		<div class="ibox ">
			<div class="ibox-title">
				<section class="progress-demo">
				<a data-toggle="modal" data-target="#myModalentrepriseadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Entreprise</button></a>
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
								<th>Nom</th>
								<th>Code</th>
								<th>Contact #1</th>
								<th>Contact #2</th>
								<th>Action</th>                                      
							</tr>
						</thead>
						<tbody>
						@php $cpt = 1; @endphp
						@foreach ($entreprises as $entreprise)

							<tr>                                     
								<td class="hidden-480">{{ $entreprise->name }}</td>
								<td class="hidden-480" align="center">[ {{ $entreprise->nameabrv }} ]</td>
								<td class="hidden-480" align="center">{{ $entreprise->phone1 }}</td>
								<td class="hidden-480" align="center">{{ $entreprise->phone2 }}</td>
								<td class="hidden-480" align="center">
								@if($entreprise->status == 1)
								<button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
								@else
								<button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
								@endif
								&nbsp;
								
								<a title="Modifier Données" data-toggle="modal" data-target="#myModalentrepriseupdate{{ $entreprise->id }}"><button class="btn btn-default">
								<span class="ace-icon fa fa-pencil"></span>
								</button></a>

								<div class="modal inmodal" id="myModalentrepriseupdate{{ $entreprise->id }}" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content animated bounceInRight">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<i class="fa fa-cogs modal-icon"></i>
												<h4 class="modal-title">Modification</h4>
											</div>
												<div class="modal-body" align="left">

												<form action="#" method="GET"  name="form_entrepriseupdate" class="well form-horizontal" >
													@csrf 
													@method('PATCH')
													<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Nom</label>
													<input  name="name" class="form-control" minlength="3" value="{{ $entreprise->name }}" onChange="javascript:this.value=this.value.toUpperCase();" required="required" value="" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
													</div>

													<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Code</label>
													<input  name="nameabrv" class="form-control" maxlength="3" value="{{ $entreprise->nameabrv }}"  onChange="javascript:this.value=this.value.toUpperCase();" required="required" value="" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
													</div>

													<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #1</label>
													<input  name="phone1" class="form-control" minlength="3"  pattern="[0-9]{13}" value="{{ $entreprise->phone1 }}" onKeyUp="verif_integer(this)" required="required">
													</div>

													<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #2</label>
													<input  name="phone2" class="form-control" minlength="3"  pattern="[0-9]{13}" value="{{ $entreprise->phone2 }}" onKeyUp="verif_integer(this)" required="required">
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
	{!! $entreprises->links() !!}
	<div class="modal inmodal" id="myModalentrepriseadd" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
					<div class="modal-body" align="left">

					<form action="{{ route('entrepriseadd') }}" method="GET"  name="form_entrepriseadd" class="well form-horizontal" >
					{{ csrf_field() }}
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Nom</label>
						<input  name="name" class="form-control" minlength="3" onChange="javascript:this.value=this.value.toUpperCase();" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Code</label>
						<input  name="nameabrv" class="form-control" maxlength="3" onChange="javascript:this.value=this.value.toUpperCase();" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #1</label>
						<input  name="phone1" class="form-control" minlength="3" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #2</label>
						<input  name="phone2" class="form-control" minlength="3" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
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
    <!-- Fin Enregistrement Entreprise -->
    <!-- Debut Enregistrement Région -->

<div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <section class="progress-demo">
                        <a data-toggle="modal" data-target="#myModalregionadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Region&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
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
                                      <th>Nom</th>
                                      <th>Code</th>
                                      <th>Contact #1</th>
                                      <th>Contact #2</th>
                                      <th>Action</th>                                      
                                    </tr>
                              </thead>
                              <tbody>
							  @php $cpt = 1; @endphp
							  @foreach ($entreprises as $entreprise)
                                    <tr>                                     
                                      <td class="hidden-480">{{ $entreprise->entrepriseRegion->name }}</td>
                                      <td class="hidden-480" align="center">[ {{ $entreprise->entrepriseRegion->nameabrv }}  ]</td>
                                      <td class="hidden-480" align="center">{{ $entreprise->entrepriseRegion->phone1 }}</td>
                                      <td class="hidden-480" align="center">{{ $entreprise->entrepriseRegion->phone2 }}</td>
                                      <td class="hidden-480" align="center">
										
										@if($entreprise->entrepriseRegion->status == 1)
										<button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>
										@else
										<button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>
										@endif
										&nbsp;

										<a title="Modifier Données" data-toggle="modal" data-target="#myModalregionupdate"><button class="btn btn-default">
										<span class="ace-icon fa fa-pencil"></span>
										</button></a>

										<div class="modal inmodal" id="myModalregionupdate" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content animated bounceInRight">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
														<i class="fa fa-cogs modal-icon"></i>
                                                		<h4 class="modal-title">Modification</h4>

													</div>
														<div class="modal-body" align="left">

														<form action="" method="post"  name="form_regionupdate" class="well form-horizontal" >
															<input type="hidden" name="regionId" value="" class="form-control" readonly="readonly">

															<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Entreprise</label>
															<select name="regionEntrepriseId"  class="chosen-select" required="required">
															<option value="">Nom Entreprise</option>
															
															</select>
															</div>

															<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Nom</label>
															<input  name="regionName" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" required="required" value="" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
															</div>

															<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Code</label>
															<input  name="regionCode" class="form-control" maxlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" required="required" value="" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
															</div>

															<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #1</label>
															<input  name="regionPhone1" class="form-control" minlength="3"  pattern="[0-9]{13}" value="" onKeyUp="verif_integer(this)" required="required">
															</div>

															<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #2</label>
															<input  name="regionPhone2" class="form-control" minlength="3"  pattern="[0-9]{13}" value="" onKeyUp="verif_integer(this)" required="required">
															</div>

															<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
															<select name="regionStatut"  class="chosen-select" required="required">
															
															<option value="1">ACTIF</option>
															<option value="0">INACTIF</option>
															</select>
															</div>

															<div class="modal-footer">

															<button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
															<i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

															<button class="ladda-button btn btn-danger" type="submit" name="mod_region" data-style="expand-right">
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
		{!! $entreprises->links() !!}


<div class="modal inmodal" id="myModalregionadd" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInRight">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="fa fa-desktop modal-icon"></i>
                <h4 class="modal-title">Insertion</h4>
			</div>
				<div class="modal-body" align="left">

				<form action="{{ route('regionadd') }}" method="GET"  name="form_regionadd" class="well form-horizontal" >

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Entreprise</label>
						<select name="entreprise_id"  class="chosen-select" required="required">
						<option value="">-Selection Entreprise-</option>
						@foreach ($entreprises as $entreprise)
							<option value="{{ $entreprise->id }}">{{ $entreprise->name }}</option> 
						@endforeach 
						</select>
					</div>

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Nom</label>
					<input  name="name" class="form-control" minlength="3" onChange="javascript:this.value=this.value.toUpperCase();" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
					</div>

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Code</label>
					<input  name="nameabrv" class="form-control" maxlength="3" onChange="javascript:this.value=this.value.toUpperCase();" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
					</div>

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #1</label>
					<input  name="phone1" class="form-control" minlength="3" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
					</div>

					<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #2</label>
					<input  name="phone2" class="form-control" minlength="3" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
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

					<button class="ladda-button btn btn-success" type="submit"  data-style="expand-right">
					<i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
					</div>

				</form>

				</div>
		</div>
	</div>
</div>
<!-- Fin Enregistrement Région -->
<!-- Début Enregistrement Section -->
<div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <section class="progress-demo">
                            <a data-toggle="modal" data-target="#myModalsectionadd"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Section&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
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
                                          <th>Nom</th>
                                          <th>Code</th>
                                          <th>Contact #1</th>
                                          <th>Contact #2</th>
                                          <th>Action</th>                                      
                                        </tr>
                                  </thead>
                                  <tbody>
								 
                                    <tr>                                     
                                      <td class="hidden-480"></td>
                                          <td class="hidden-480" align="center">[ ]</td>
                                          <td class="hidden-480" align="center"></td>
                                          <td class="hidden-480" align="center"></td>
                                          <td class="hidden-480" align="center">
											
											<button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>

											<button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>

											&nbsp;
											
											<a title="Modifier Données" data-toggle="modal" data-target="#myModalsectionupdate"><button class="btn btn-default">
											<span class="ace-icon fa fa-pencil"></span>
											</button></a>

											
											<div class="modal inmodal" id="myModalsectionupdate" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content animated bounceInRight">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<i class="fa fa-cogs modal-icon"></i>
               												 <h4 class="modal-title">Modification</h4>

														</div>
															<div class="modal-body" align="left">

															<form action="" method="post"  name="form_sectionupdate" class="well form-horizontal" >
																<input type="hidden" name="sectionId" value="" class="form-control" readonly="readonly">
																<input type="hidden" name="regionId" value="" class="form-control" readonly="readonly">

																<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Région</label>
																<select name="sectionRegionId"  class="chosen-select" required="required">
																<option value="">Nom Région</option>
																
																</select>
																</div>

																<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Nom</label>
																<input  name="sectionName" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" required="required" value="" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
																</div>

																<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Code</label>
																<input  name="sectionCode" class="form-control" maxlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" required="required" value="" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
																</div>

																<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #1</label>
																<input  name="sectionPhone1" class="form-control" minlength="3"  pattern="[0-9]{13}" value="" onKeyUp="verif_integer(this)" required="required">
																</div>

																<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #2</label>
																<input  name="sectionPhone2" class="form-control" minlength="3"  pattern="[0-9]{13}" value="" onKeyUp="verif_integer(this)" required="required">
																</div>

																<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
																<select name="sectionStatut"  class="chosen-select" required="required">
																
																<option value="1">ACTIF</option>
																<option value="0">INACTIF</option>
																</select>
																</div>

																<div class="modal-footer">

																<button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
																<i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

																<button class="ladda-button btn btn-danger" type="submit" name="mod_section" data-style="expand-right">
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
            </div>
			
	
	<div class="modal inmodal" id="myModalsectionadd" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<i class="fa fa-desktop modal-icon"></i>
                <h4 class="modal-title">Insertion</h4>
				</div>
					<div class="modal-body" align="left">

					<form action="{{ route('sectionadd') }}" method="GET"  name="form_sectionadd" class="well form-horizontal" >

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Region</label>
							<select name="region_id"  class="chosen-select" required="required">
							<option value="1">Selection Region</option>
							@foreach ($entreprises as $entreprise)
							<option value="{{ $entreprise->entrepriseRegion->id }}">{{ $entreprise->entrepriseRegion->name }}</option> 
							@endforeach 
							
							</select>
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Nom</label>
						<input  name="name" class="form-control" minlength="3" onChange="javascript:this.value=this.value.toUpperCase();" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Code</label>
						<input  name="nameabrv" class="form-control" maxlength="3" onChange="javascript:this.value=this.value.toUpperCase();" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #1</label>
						<input  name="phone1" class="form-control" minlength="3" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Contact #2</label>
						<input  name="phone2" class="form-control" minlength="3" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
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
	<!-- Fin Enregistrement section -->

@endsection
