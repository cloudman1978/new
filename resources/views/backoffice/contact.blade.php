@extends('backoffice/layouts/layoutForm')

@section('title')
	Contact
@stop

@section('body')

    @section('msg')
        Contactez nous
    @stop


	@section('form')

		<form method="post" action="http://alliance-html.themerex.net/" id="form-contact1">
                                    <div class="panel-body pn">
                                        <div class="section">
                                            <label for="names" class="field prepend-icon">
                                                <input type="text" name="names" id="names" class="gui-input"
                                                       placeholder="Nom">
                                                <label for="names" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- -------------- /section -------------- -->

                                        <div class="section">
                                            <label for="email" class="field prepend-icon">
                                                <input type="email" name="email" id="email" class="gui-input"
                                                       placeholder="Email">
                                                <label for="email" class="field-icon">
                                                    <i class="fa fa-envelope"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- -------------- /section -------------- -->

                                        <div class="section">
                                            <label for="subject"  class="field select">
                                               <!-- <input type="text" name="subject" id="subject" class="gui-input"
                                                       placeholder="Sujet..."> -->
                                               <!-- <label for="subject" class="field-icon">
                                                    <i class="fa fa-exclamation"></i>
                                                </label>-->
                                                <select name="subject" id="subject" required="true" > 
                                                    <option value="">Sujet concerne...</option>
                                                    <option value="rdv">Un rendez-vous</option>
                                                    <option value="doc">Un médecin</option>
                                                    <option value="support">Un problème technique</option>
                                                    <option value="jobs">Une offre d'emploi</option>
                                                    <option value="autres">Autres</option>
                                                </select>
                                                
                                            </label>
                                        </div>
                                        <!-- -------------- /section -------------- -->

                                        <div class="section">
                                            <label for="comment" class="field prepend-icon">
                          <textarea class="gui-textarea" id="comment" name="comment"
                                    placeholder="Votre message"></textarea>
                                                <label for="comment" class="field-icon">
                                                    <i class="fa fa-align-justify"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- -------------- /section -------------- -->

                                        <div class="section">
                                            <div class="smart-widget sm-left sml-80">
                                                <label for="verify" class="field prepend-icon">
                                                    <input type="text" name="verify" id="verify" class="gui-input"
                                                           placeholder="Math captcha">
                                                    <label for="verify" class="field-icon">
                                                        <i class="fa fa-lock"></i>
                                                    </label>
                                                </label>
                                                <label for="verify" class="button">3 + 3</label>
                                            </div>
                                            <!-- -------------- /Block Widget -------------- -->
                                        </div>
                                        <!-- -------------- /section -------------- -->

                                    </div>
                                    <!-- -------------- /Form -------------- -->
                                    <div class="section text-right">
                                        <button type="submit" class="btn btn-primary btn-bordered ph40">Envoyer</button>
                                    </div>
                                </form>

	@stop
	
	
@stop