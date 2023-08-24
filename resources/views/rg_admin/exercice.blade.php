@extends('adminsquelette')
@section('titre_page')
 Finance
@endsection

@section('position')
 Exercices
@endsection

@section('contenu')
<div class="row">

<div class="col-lg-2">
</div>
    <div class="col-lg-8">
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
                                <a title="Modifier Données" data-toggle="modal" data-target="#myModalexerciceupdate{{ $exercice->id }}"><button class="btn btn-default">
                                <span class="ace-icon fa fa-pencil"></span>
                                </button></a>

                                
                                <div class="modal inmodal" id="myModalexerciceupdate{{ $exercice->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated bounceInRight">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <i class="fa fa-cogs modal-icon"></i>
                                                <h4 class="modal-title">Modification</h4>
                                            </div>
                                                    <div class="modal-body" align="left">
                                                    
                                                    <form action="{{ route('exerciceupdate', $exercice->id) }}" method="GET"  name="form_exerciceupdate"  class="well form-horizontal" >
                                                    @csrf 
												    @method('PUT')

                                                    <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Année exercice</label>
                                                    <input name="name" value="{{ $exercice->name }}" class="form-control" minlength="4" maxlength="4" onKeyUp="verif_integer(this)" readonly="readonly" required="required">
                                                    </div>

                                                    <div class="form-group"><font color="red"><b>*</b></font>&nbsp;<label>Statut</label>
                                                    <select name="status"  class="chosen-select" required="required">
                                                    @if($exercice->status == 1)
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

													<input type="hidden" name="hidden_id" value="{{ $exercice->id }}" />

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
            {!! $exercices->links() !!}

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

<div class="col-lg-2">
</div>
    
@endsection
