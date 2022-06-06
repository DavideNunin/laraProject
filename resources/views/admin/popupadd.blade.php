<div id="overlay"></div>
<div class="container d-flex justify-content-center align-items-center">
<div id="popupAdd">
    <div class="container p-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-10">
                <span id="popuptitle" class="title-popup">Aggiungi</span>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <span id="popupAdd-close" class="closePopup"><i class="fa-solid fa-xmark"></i></span>
            </div>
        </div>
        <div class="popupcontent">
            <div class="container">

                {{ Form::open(array('id' => 'newfaq-form', 'class' => 'addnewfaq-form')) }}
                <div class="col-lg-12">
                    {{ Form::label('domanda', 'Domanda', ['class' => 'form-label']) }}
                    {{ Form::text('domanda', '', ['class' => 'form-control', 'id' => 'domanda']) }}
                    <span id="errDomanda"></span>
                </div>
                <div class="col-lg-12 mb-3">
                    {{ Form::label('risposta', 'Risposta', ['class' => 'form-label']) }}
                    {{ Form::textarea('risposta', '', ['class' => 'form-control form-textarea', 'id' => 'risposta', 'rows' => 3, 'maxlength' => '2000']) }}
                    <span id="errRisposta"></span>
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