@extends('backoffice.layouts.layout')


@section('title')
	Espace Gestionnaire 
@stop

@section('body')

	@section('deconnect')
		<a href="/backoffice/auth/logout">Déconnexion </a>
	@stop

	@section('deconnect2')
	 <a href="/backoffice/auth/logout" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> Déconnexion </a>

    @stop
	
	@section('user')
		
	@stop

	@section('category')
		Sécrétaire
	@stop

	  @section('menuUser')

         <!-- -------------- Sidebar - Author Menu  -------------- -->
                <div class="sidebar-widget menu-widget">
                    <div class="row text-center mbn">
                        <div class="col-xs-2 pln prn">
                            <a href="#" class="text-primary" data-toggle="tooltip" data-placement="top"
                               title="Tableau de bord">
                                <span class="fa fa-dashboard"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="charts-highcharts.html" class="text-info" data-toggle="tooltip"
                               data-placement="top" title="Stats">
                                <span class="fa fa-bar-chart-o"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="/patients/payment" class="text-system" data-toggle="tooltip"
                               data-placement="top" title="Payments">
                                <span class="fa fa-usd"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="/patients" class="text-warning" data-toggle="tooltip"
                               data-placement="top" title="Consultations">
                                <span class="fa fa-calendar"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="basic-profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                               title="Médecins">
                                <span class="fa fa-users"></span>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2 pln prn">
                            <a href="management-tools-dock.html" class="text-danger" data-toggle="tooltip"
                               data-placement="top" title="Modifier profile">
                                <span class="fa fa-cogs"></span>
                            </a>
                        </div>
                    </div>
                </div>

    @stop

	@section('category')
		Patient
	@stop

	 @section('menuadmin')  

      <li>
                
                                
                         <a href="backoffice/secretary/patient">
                        <span class="fa fa-users"></span>
                        <span class="sidebar-title"> Gérer les patients
                        </span>
                    </a>
                </li>   
                   <li>

                       <?php echo  "<a href=".'backoffice/secretary/payment?date='.$date.">" ?>
                        <span class="fa fa-cc-mastercard"></span>
                        <span class="sidebar-title"> Gérer les payments
                        </span>
                    </a>
                </li>

      <li>


          <?php echo  "<a href=".'backoffice/secretary/rdv?date='.$date.">" ?>
              <span class="fa fa-user-md"></span>
                        <span class="sidebar-title"> Gérer les rendez-vous
                        </span>
          </a>
      </li>
      <li>


          <a href="backoffice/secretary/patientAnalysis">
              <span class="fa fa-search-plus"></span>
                        <span class="sidebar-title"> Gérer les analyses de patients
                        </span>
          </a>
      </li>

     @stop

     @section('user')

    

     @stop

     @section('current')

          <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                            <span class="fa fa-dashboard"></span>                  
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/admin">Tableau de bord</a>
                    </li>
                    
                </ol>
     @stop

	
	 @section('user-role')
	  <optgroup label="Connecté comme:">
                                    <option value="1-1" >Admin</option>
                                    <option value="1-2" >Professionnel</option>
                                    <option value="1-3" selected="selected">Gestionnaire</option>
                                    <option value="1-4">Patient</option>

     </optgroup>
    @stop
	
@stop