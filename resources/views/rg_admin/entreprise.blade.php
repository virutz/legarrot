@extends('adminsquelette')
@section('titre_page')
 Administration
@endsection

@section('position')
 Entreprise
@endsection

@section('contenu')

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

												<form action="{{ route('entrepriseupdate', $entreprise->id) }}" method="GET"  name="form_entrepriseupdate" class="well form-horizontal" >
												@csrf 
												@method('PUT')
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

													@if($entreprise->status == 1)
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

													<input type="hidden" name="hidden_id" value="{{ $entreprise->id }}" />

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
@endsection