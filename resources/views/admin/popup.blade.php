<div id="overlay"></div>
<div id="popup">
    <div class="container p-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-10">
                <span id="popuptitle" class="title-popup"></span>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                <span id="popupclose"><i class="fa-solid fa-xmark"></i></span>
            </div>
        </div>
        <div class="popupcontent">
            <div class="container">

                {{ Form::open(array('route' => 'faqmanager.newfaq', 'id' => 'newfaq-form', 'class' => 'addnewfaq-form')) }}
                <div class="col-lg-12">
                    {{ Form::label('domanda', 'Domanda', ['class' => 'form-label']) }}
                    {{ Form::text('domanda', '', ['class' => 'form-control', 'id' => 'domanda']) }}
                </div>
                <div class="col-lg-12">
                    {{ Form::label('risposta', 'Risposta', ['class' => 'form-label']) }}
                    {{ Form::textarea('risposta', '', ['class' => 'form-control form-textarea', 'id' => 'risposta', 'rows' => 1, 'maxlength' => '2000']) }}
                </div>
                <div class="col-lg-12">
                    {{ Form::submit('Aggiungi', ['class' => 'newfaq-button mb-4', 'id' => 'newfaq-submit']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>