@extends('homesquelette')
@section('titre_page')
Inscription
@endsection

@section('position')
 Adhérant
 @endsection

@section('contenu')
<div class="row">

    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <section class="progress-demo">
                <a data-toggle="modal" data-target="#myModaltuteur"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;Je m'inscris | Tuteur&nbsp;</button></a>
                </section>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <section class="progress-demo">
                <a data-toggle="modal" data-target="#myModalbeneficiaire"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;J'inscris | Bénéficiaire</button></a>
                </section>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <section class="progress-demo">
                <a data-toggle="modal" data-target="#myModaladherant"><button class="btn btn-warning"><span class="ace-icon fa fa-desktop"></span>&nbsp;J'inscris | Adhérant&nbsp;&nbsp;&nbsp;</button></a>
                </section>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
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
                        
						<div class="modal-footer">

						<button class="ladda-button btn btn-default" type="button" data-dismiss="modal">
						<i class="ace-icon fa fa-remove"></i>&nbsp;&nbsp;Annuler</button>

						<button class="ladda-button btn btn-success"   data-style="expand-right">
						<i class="ace-icon fa fa-send"></i>&nbsp;&nbsp;Soumettre</button>
						</div>

					</form>

					</div>
			</div>
		</div>
	</div>


    <div class="modal inmodal" id="myModaltuteur" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInRight">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-desktop modal-icon"></i>
                    <h4 class="modal-title">Insertion</h4>
                </div>
					<div class="modal-body" align="left">

					<form action="" method="post"  name="form_useradd" class="well form-horizontal" >
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Section [ Région ]</label>
						<select name="userAccessId" class="chosen-select" required="required">
						<option value="">Selection Section</option>
						</select>
						</div>


						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Date Adhésion</label>
						<input type="date"  name="adhesiondate"  class="form-control"  required="required" >
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Nom</label>
						<input  name="userName" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Prénom</label>
						<input  name="userLastName"  placeholder=" Saisir le ou les prenom(s)" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Sexe</label>
						<select name="userProfileId" class="chosen-select" required="required">
						<option value="">*</option>
                        <option value="1">MASCULIN</option>
                        <option value="2">FEMININ</option>
						
						</select>
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Date Naissance</label>
						<input type="date"  name="adhesiondate"  class="form-control"  required="required" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Lieu Naissance</label>
						<input  name="userName" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Situation Matr.</label>
						<select name="userProfileId" class="chosen-select" required="required">
						<option value="1">CELIBATAIRE</option>
                        <option value="2">MARIE(E)</option>
                        <option value="3">DIVORCE(E)</option>
                        <option value="4">VEUF(VE)</option>
						</select>
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Profession</label>
						<select name="userAccessId" class="chosen-select" required="required">
						<option value="">Selection Profession</option>
						</select>
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Email</label>
						<input type="email" name="userEmail" class="form-control" placeholder=" Saisir Email"  onChange="javascript:this.value=this.value.toLowerCase();" required="required" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Adresse</label>
						<input type="password" name="userPassword" placeholder=" Saisir Adresse" class="form-control"  required="required" title="Doit contenir au moins une majuscule et un caractère alphanumérique">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Téléphone #1</label>
						<input name="userPhone1" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>
						
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Téléphone #2</label>
						<input name="userPhone2" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur Type Pièce Ident.</label>
                        <select name="clientPieceType" id="clientPieceType" class="chosen-select" required="required">
                        <option value="">Type Pièce Ident.</option>
                        <option value="ATT-">ATTESTATION</option>
                        <option value="CNI-">CARTE IDENTITE</option>
                        <option value="CCS-">CARTE CONSULAIRE</option>
                        <option value="PER-">PERMIS CONDUIRE</option>
                        <option value="AUT-">AUTRE PIECE</option>
                        </select>
                        </div>


                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Adhérant Tuteur N&deg; Pièce Ident.</label>
                        <input name="clientEmail"  id="clientEmail" placeholder=" Saisir Pièce Ident." class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();">
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



    <div class="modal inmodal" id="myModalbeneficiaire" tabindex="-1" role="dialog" aria-hidden="true">
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
						<option value="">Selection Nom / Matricule</option>
						</select>
						</div>

                    
                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire lien Parenté</label>
                        <select name="clientPieceType" id="clientPieceType" class="chosen-select" required="required">
                        <option value="">Selection Parenté</option>
                        <option value="ATT-">PERE/MERE</option>
                        <option value="CCS-">FILS/FILLE</option>
                        <option value="PER-">ONCLE/TANTE</option>
                        <option value="AUT-">NEVEU/NIECE</option>
                        </select>
                        </div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Nom </label>
						<input  name="userName" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
                        </div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Prénom </label>
						<input  name="userLastName"  placeholder=" Saisir le ou les prenom(s)" class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);" required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués">
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Sexe</label>
						<select name="userProfileId" class="chosen-select" required="required">
						<option value="">*</option>
                        <option value="1">MASCULIN</option>
                        <option value="2">FEMININ</option>
						
						</select>
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Date Naissance</label>
						<input type="date"  name="adhesiondate"  class="form-control"  required="required" >
						</div>

						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Lieu Naissance</label>
						<input  name="userName" placeholder=" Saisir le Nom"  class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();" onkeypress="return verif(event);"  required="required" title="Ne doit pas contenir d'apostrophe et autres caratères accentués" >
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Téléphone #1</label>
						<input name="userPhone1" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>
						
						<div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Téléphone #2</label>
						<input name="userPhone2" class="form-control" pattern="[0-9]{13}" placeholder="ex : 2250101386196" onKeyUp="verif_integer(this)" required="required">
						</div>

                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire Type Pièce Ident.</label>
                        <select name="clientPieceType" id="clientPieceType" class="chosen-select" required="required">
                        <option value="">Type Pièce Ident.</option>
                        <option value="ATT-">ATTESTATION</option>
                        <option value="CNI-">CARTE IDENTITE</option>
                        <option value="CCS-">CARTE CONSULAIRE</option>
                        <option value="PER-">PERMIS CONDUIRE</option>
                        <option value="AUT-">AUTRE PIECE</option>
                        </select>
                        </div>


                        <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Bénéficiaire N&deg; Pièce Ident.</label>
                        <input name="clientEmail"  id="clientEmail" placeholder=" Saisir Pièce Ident." class="form-control" minlength="3"  onChange="javascript:this.value=this.value.toUpperCase();">
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

    @endsection