<div id="overlay"></div>
<div class="container d-flex justify-content-center align-items-center">
<div id="popupDel">
    <div class="container p-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-10">
                <span id="popuptitle" class="title-popup">Elimina</span>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <span id="popupDel-close" class="closePopup"><i class="fa-solid fa-xmark"></i></span>
            </div>
        </div>
        <div>
                {{ Form::open(array('id' => 'deletefaq-form', 'class' => 'addnewfaq-form')) }}
                <div class="col-lg-12">
                    {{ Form::label('domanda', 'Sei sicuro di voler eliminare?', ['class' => 'form-label']) }}
                </div>
                <div class="col-lg-12">
                    {{ Form::submit('Elimina', ['class' => 'delfaq-button button-form mb-4', 'id' => 'delfaq-submit']) }}
                </div>
                {{ Form::close() }}
        </div>
    </div>
</div>
</div>