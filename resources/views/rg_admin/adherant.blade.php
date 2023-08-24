@extends('adminsquelette')
@section('titre_page')
 Administration
@endsection

@section('position')
 Adhérants
@endsection

@section('contenu')
<!-- Début Enregistrement Adhérent -->
<div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <section class="progress-demo">
                    <a data-toggle="modal" data-target="#myModaladherant"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Enregistrer | Adhérant</button></a>
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
                                  <th>Prénoms</th>
                                  <th>Contacts</th>                       
                                  <th>Matricule</th>
                                  <th>Section</th>
                                  <th>Actions</th>                                      
                                </tr>
                          </thead>
                          <tbody>
                            

                                <tr>                                     
                                  <td class="hidden-480"></td>
                                  <td class="hidden-480"></td>
                                  
                                  <td class="hidden-480" align="center"></br></td>
                                  <td class="hidden-480" align="center"></td>
                                  <td class="hidden-480" align="center"></br>SMS</td>
                                  <td class="hidden-480" align="center">
									
									<button class="btn btn-circle btn-success" title="ACTIF" ><span class="glyphicon glyphicon-check"></span></button>

									<button class="btn btn-circle btn-danger" title="INACTIF" ><span class="glyphicon glyphicon-trash"></span></button>

									&nbsp;
									
									<a title="Modifier Données" data-toggle="modal" data-target="#"><button class="btn btn-default">
									<span class="ace-icon fa fa-pencil"></span>
									</button></a>

									<div class="modal inmodal" id="myModaluserupdate" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content animated bounceInRight">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <i class="fa fa-cogs modal-icon"></i>
                                                    <h4 class="modal-title">Modification</h4>
												</div>
													<div class="modal-body" align="left">

                                                            <form action="" method="post"  name="form_adhenr" id="form_userupdate" class="well form-horizontal" >
                                                            <input type="hidden" name="userId" value="" class="form-control" readonly="readonly">



                                                            <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                            <select name="userStatut"  class="chosen-select" required="required">

                                                            <option value="1">ACTIF</option>
                                                            <option value="0">INACTIF</option>
                                                            </select>
                                                            </div>

                                                            <div class="modal-footer">

                                                            <button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
                                                            <i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

                                                            <button class="ladda-button btn btn-danger" type="submit" name="mod_user" data-style="expand-right">
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
       
	<div class="modal inmodal" id="myModaladherant" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
					<div class="modal-body" align="left">

					<form action="" method="post"  name="form_useradd" class="well form-horizontal" >
						

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Tuteur</label>
						<select name="userAccessId" class="chosen-select" required="required">
						<option value="">Selection Nom/Matricule</option>
					
						</select>
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Date Adhésion</label>
						<input type="date"  name="adhesiondate"  class="form-control"  required="required" >
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent lien Parenté</label>
                        <select name="clientPieceType" id="clientPieceType" class="chosen-select" required="required">
                        <option value="">Selection Parenté</option>
                        <option value="ATT-">PERE/MERE</option>
                        <option value="CCS-">FILS/FILLE</option>
                        <option value="PER-">ONCLE/TANTE</option>
                        <option value="AUT-">NEVEU/NIECE</option>
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Nom</label>
						<input  name="userName" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Prénom</label>
						<input  name="userLastName"  placeholder=" Saisir le ou les prenom(s)" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Sexe</label>
						<select name="userProfileId" class="chosen-select" required="required">
						<option value="">*</option>
                        <option value="1">MASCULIN</option>
                        <option value="2">FEMININ</option>
						
						</select>
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Date Naissance</label>
						<input type="date"  name="adhesiondate"  class="form-control"  required="required" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Lieu Naissance</label>
						<input  name="userName" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

						
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Téléphone #1</label>
						<input name="userPhone1" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>
						
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérent Téléphone #2</label>
						<input name="userPhone2" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
						<select name="userStatut"  class="chosen-select" required="required">
						<option value="1">ACTIF</option>
						<option value="0">INACTIF</option>
						</select>
						</div>

                        
						<div class="modal-footer">

						<button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

						<button class="ladda-button btn btn-success" type="submit" name="ins_user" data-style="expand-right">
						<i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
						</div>

					</form>

					</div>
			</div>
		</div>
	</div>
    
	<!-- Fin Enregistrement Adhérent -->
@endsection
