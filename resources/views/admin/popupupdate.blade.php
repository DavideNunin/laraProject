<div id="overlay"></div>
<div class="container d-flex justify-content-center align-items-center">
<div id="popupUpdate">
    <div class="container p-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-10">
                <span id="popuptitle" class="title-popup">Modifica</span>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <span id="popupclose" class="closePopup"><i class="fa-solid fa-xmark"></i></span>
            </div>
        </div>
        <div class="popupcontent">
            <div class="container">

                {{ Form::open(array('id' => 'updatefaq-form', 'class' => 'addnewfaq-form')) }}
                <div class="col-lg-12">
                    {{ Form::label('domanda', 'Domanda', ['class' => 'form-label']) }}
                    {{ Form::text('domanda', old('domanda'), ['class' => 'form-control', 'id' => 'domanda_update']) }}
                    <span id="errDomandaUpdate"></span>
                </div>
                <div class="col-lg-12 mb-3">
                    {{ Form::label('risposta', 'Risposta', ['class' => 'form-label']) }}
                    {{ Form::textarea('risposta', old('risposta'), ['class' => 'form-control form-textarea', 'id' => 'risposta_update', 'rows' => 3, 'maxlength' => '2000']) }}
                    <span id="errRispostaUpdate"></span>
                </div>
                <div class="col-lg-12">
                    {{ Form::submit('Aggiungi', ['class' => 'button-form mb-4', 'id' => 'updatefaq-submit']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</div>