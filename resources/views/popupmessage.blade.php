<div id="overlay"></div>
<div class="container d-flex justify-content-center align-items-center">
<div id="popupMessage">
    <div class="container p-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-10">
                <span id="popuptitle" class="title-popup">Invia un messaggio</span>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <span id="popupMessage-close" class="closePopup"><i class="fa-solid fa-xmark"></i></span>
            </div>
        </div>
        <div class="popupcontent">
            <div class="container">

                {{ Form::open(array('id' => 'formSendMessage', 'class' => 'addnewfaq-form')) }}
                <div class="col-lg-12 mb-3">
                    {{ Form::label('messaggio-text', 'Scrivi qui il tuo messaggio', ['class' => 'form-label']) }}
                    {{ Form::textarea('messaggio', '', ['class' => 'form-control form-textarea', 'id' => 'risposta', 'rows' => 4, 'maxlength' => '2000']) }}
                    <span id="errMessaggio"></span>
                </div>
                <div class="col-lg-12">
                    {{ Form::submit('Aggiungi', ['class' => 'button-form mb-4', 'id' => 'newfaq-submit']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</div>