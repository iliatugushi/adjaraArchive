@extends('layouts.viewer')



@section('css')
<style>
    /* LEFT */


    #leftSide {
        background-color: white;
        position: fixed;
        width: 25%;
        left: 0;
        overflow-y: scroll;
        top: 0;
        bottom: 0;
        padding: 20px;
        z-index: 999;
    }

    #thumbs {
        list-style: none;
        padding: 0px;
        margin: 0px;
        overflow-x: hidden;
    }

    .img-element {
        padding: 10px;
    }

    .active {
        background-color: #ebebeb;
    }

    .img-element img {
        height: 120px;
    }

    #indexID {
        width: 40px;
        border-radius: 10px;
        border: solid 1px #b1b1b1;
        padding-left: 10px;
    }


    /* CENTER */
    .full {
        width: 105%;
        left: 0%;
    }

    .boxed {
        width: 75%;
        left: 25%;
    }

    #middleBox {
        background-color: #252525;
        display: grid;
        place-items: center;
        position: fixed;

        height: 100%;

    }

    #content_viewer {
        float: left;
        width: 800px;
        position: absolute;
        z-index: 9;
        cursor: move;
    }

    #content_viewer img {
        float: left;
    }

    .singleView img {
        width: 100%;
    }

    .bookView img {
        width: 50%;
    }

    #footer {
        position: absolute;
        right: auto;
        bottom: 50px;
        z-index: 999;
        place-items: center;
    }

    #header {
        position: absolute;
        right: auto;
        top: 50px;
        z-index: 999;
        place-items: center;
    }

    .btn-outline-primary {
        color: white;
        border: solid 1px white;
    }

    #leftOpenClose {
        position: absolute;
        top: 20;
        left: 25%;
        background-color: white;
        color: black;
        font-weight: bold;
        padding: 10px 20px 10px 20px;
        z-index: 999;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .scrollpane {
        height: 600px;
        overflow: auto;
    }

    .loading {
        color: black;
    }
</style>

@endsection
<div class="container-fluid">



    <a href="javascript:void(0)" id="leftOpenClose" state="open"><span id="pages">1</span> /<span
            class="totalCounter"></span></a>
    <div id="maxImages" style="display:none;" maxImages=""></div>
    <div id="leftSide">

        <div class="col-12 text-center mb-2 pt-3 row">
            <div class="col-4 text-left" style="padding:0px;">
                <input type="text" value="1" id="indexID"> / <span class="totalCounter"></span>
            </div>
            <div class="col-4 text-center" style="padding:0px;">
                <button class="btn btn-default btn-sm  caps" data-toggle="collapse" data-target="#filtersBox">
                    ფილტრები
                </button>
            </div>
            <div class="col-4 text-right" style="padding:0px;">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input class="thumbSelector" type="radio" value="single" autocomplete="off" checked>
                        <i class="far fa-file-alt"></i>
                    </label>
                    <label class="btn btn-secondary">
                        <input class="thumbSelector" type="radio" value="double" autocomplete="off">
                        <i class="fas fa-book-open"></i>
                    </label>

                </div>
            </div>


            <div class="col-12 collapse pt-3 pb-3" id="filtersBox">
                <div class="sliders">
                    <form id="imageEditor">
                        <p>
                            <label for="gs">Grayscale</label>
                            <input id="gs" name="gs" type="range" min="0" max="100" value="0">
                        </p>

                        <p>
                            <label for="blur">Blur</label>
                            <input id="blur" name="blur" type="range" min="0" max="10" value="0">
                        </p>

                        <p>
                            <label for="br">Brightness</label>
                            <input id="br" name="br" type="range" min="0" max="200" value="100">
                        </p>

                        <p>
                            <label for="ct">Contrast</label>
                            <input id="ct" name="ct" type="range" min="0" max="200" value="100">
                        </p>

                        <p>
                            <label for="huer">Hue Rotate</label>
                            <input id="huer" name="huer" type="range" min="0" max="360" value="0">
                        </p>

                        <p>
                            <label for="opacity">Opacity</label>
                            <input id="opacity" name="opacity" type="range" min="0" max="100" value="100">
                        </p>

                        <p>
                            <label for="invert">Invert</label>
                            <input id="invert" name="invert" type="range" min="0" max="100" value="0">
                        </p>

                        <p>
                            <label for="saturate">Saturate</label>
                            <input id="saturate" name="saturate" type="range" min="0" max="500" value="100">
                        </p>

                        <p>
                            <label for="sepia">Sepia</label>
                            <input id="sepia" name="sepia" type="range" min="0" max="100" value="0">
                        </p>

                        <input type="reset" form="imageEditor" id="reset" value="სტანდარტზე დაბრუნება"
                            class="font-control caps" />

                    </form>
                </div>
            </div>
        </div>

        <div id="thumbView" class="scrollpane text-center pt-3 pb-3">
            <ul id="thumbs"> </ul>
        </div>
    </div>

    <div id="middleBox" class="boxed">
        <div id="content_viewer" class="singleView"> </div>

        <div id="header">
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-info"></i>
            </button>
            <a href="{{ URL::previous() }}" class="btn btn-outline-secondary">
                <i class="fas fa-power-off"></i>
            </a>
        </div>

        <div id="footer">
            <button type="button" class="btn btn-outline-secondary nextPrev" method="prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary nextPrev" method="next">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary rotate" method="minus">
                <i class="fas fa-undo"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary rotate" method="plus">
                <i class="fas fa-redo"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary zoom" method="in">
                <i class="fas fa-search-plus"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary zoom" method="reset">
                <i class="fas fa-search"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary zoom" method="out">
                <i class="fas fa-search-minus"></i>
            </button>
        </div>
    </div>



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">აღწერა</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="instructionBody">
                </div>
            </div>
        </div>
    </div>
</div>



@section('js')

<script>
    let mode = 'single';
    let currentIndex = 0;
    var rotation = 0;
    var zoom = 1;

    var current_page = {!! $current_page !!};
    let per_page = {!! $per_page !!};
    let sakme_id = {!! json_encode($sakme_id) !!}

    $(document).ready(function() {
        loadResults(sakme_id, current_page, per_page);
        // activateThumb(0);
    });

    // left side open close
    $('#leftOpenClose').click(function(){

        if($(this).attr('state')==='open'){
            $('#leftSide').hide();
            $('#middleBox').removeClass('boxed');
            $('#middleBox').addClass('full');
            $(this).attr('state', 'closed');
            $(this).css('left', '0%');
        }
        else{
            $('#leftSide').show();
            $('#middleBox').removeClass('full');
            $('#middleBox').addClass('boxed');
            $(this).attr('state', 'open');
            $(this).css('left', '25%');
        }
    });

    // Thumb Click
    $(document).on("click", '.img-element', function(event) {
        activateThumb($(this).attr('index'));
        // Change Index
        $("#indexID").val(parseInt($(this).attr('index')) + 1);
    });


    // Change Mode
    $(".thumbSelector").click(function(){
       mode = $(this).val();
       $("#indexID").val();
       if(mode === 'double'){
        $('#content_viewer').removeClass('singleView');
        $('#content_viewer').addClass('bookView');
       }
       else{
        $('#content_viewer').addClass('singleView');
        $('#content_viewer').removeClass('bookView');
       }
       activateThumb(parseInt($("#indexID").val()) - 1);
    });

    // Index Change
    $(document).on("keyup", '#indexID', function(event) {
       if(parseInt(this.value) < $('#maxImages').attr('maxImages')){
            if ($.isNumeric(this.value)) {
                let newIndex = this.value - 1;
                activateThumb(newIndex);
            }
        }
        else{
            alert('ამ ინდექსის გვერდი არ არსებობს');
        }
    });


    // Next Prev Button
    $('.nextPrev').click(function(){
        let newIndex = 0;
        if($(this).attr('method') === 'next'){
            newIndex = parseInt($("#indexID").val()) + 1;
            if(newIndex > $('#maxImages').attr('maxImages')){
                newIndex = 1;
            }
        }
        else{
            newIndex = parseInt($("#indexID").val()) - 1;
            if(newIndex < 1){
                newIndex = $('#maxImages').attr('maxImages');
            }
        }
        console.log("New Index: " + newIndex);
        $("#indexID").val(newIndex);
        activateThumb(newIndex -1);
    });


    // ROTATION
    $('.rotate').click(function() {
        let rotationMethod = $(this).attr('method');
        if(rotationMethod === 'plus'){
            rotation += 90;
        }
        else{
            rotation -= 90;
        }

        $(this).rotate(rotation);
    });
    jQuery.fn.rotate = function(degrees) {
        $('#content_viewer').css({'transform' : 'rotate('+ degrees +'deg)'});
    };


    // ZOOM
     $('.zoom').click(function() {
        let zoomMethod = $(this).attr('method');

        if(zoomMethod === 'in'){
            zoom += 0.3;
        }
        if(zoomMethod === 'out'){
            zoom -= 0.3;
        }
        if(zoomMethod === 'reset'){
            zoom = 1;
        }
        $("#content_viewer").animate({ 'zoom': zoom }, 0);
    });
    $(document).ready(function(){
        $('#middleBox').bind('wheel mousewheel', function(e){
            var delta;
            if (e.originalEvent.wheelDelta !== undefined)
                delta = e.originalEvent.wheelDelta;
            else
            delta = e.originalEvent.deltaY * -1;

            if(delta > 0) {
                zoom += 0.3;
                $("#content_viewer").animate({ 'zoom': zoom },0);
            }
            else{
               zoom -= 0.3;
                $("#content_viewer").animate({ 'zoom': zoom },0);
            }
        });
    });

    function activateThumb(index){

        var html = '';
        $('.img-element').removeClass('active');
        if(mode === 'single'){
            $('#thumb-' + index).addClass('active');
            let src = $('#thumb-' + index).children('img').attr('src');
            html = '<img src="'+src+'" class="img-fluid img-element-viewer" />';

            $('#pages').html(parseInt(index) + 1);

        }
        if(mode === 'double'){
            var nextID = parseInt(index) + 1;
            if($('#thumb-' + nextID).length){
                let currentHTML = '';
                let nextHTML = '';

                $('#thumb-' + index).addClass('active');
                let srcCurrent = $('#thumb-' + index).children('img').attr('src');
                currentHTML = '<img src="'+srcCurrent+'" class="img-fluid img-element-viewer" />';


                $('#thumb-' + nextID).addClass('active');
                let srcNext = $('#thumb-' + nextID).children('img').attr('src');
                nextHTML = '<img src="'+srcNext+'" class="img-fluid img-element-viewer"/>';

                html = currentHTML + nextHTML;

                let firstIndex = parseInt(index) + 1;
                let secondIndex = parseInt(index) + 2;
                $('#pages').html(firstIndex + ' - ' + secondIndex);

            }
            else{
                let currentHTML = '';
                let nextHTML = '';

                $('#thumb-' + index).addClass('active');
                let srcCurrent = $('#thumb-' + index).children('img').attr('src');
                currentHTML = '<img src="'+srcCurrent+'" class="img-fluid img-element-viewer" />';


                $('#thumb-0').addClass('active');
                let srcNext = $('#thumb-0').children('img').attr('src');
                nextHTML = '<img src="'+srcNext+'" class="img-fluid img-element-viewer"/>';
                html = currentHTML + nextHTML;

                let firstIndex = parseInt(index) + 1;
                let secondIndex = 1;
                $('#pages').html(firstIndex + ' - ' + secondIndex);

            }
        }
        $('#content_viewer').html(html);
    }

    // FILTERS
    function editImage() {
        var gs = $("#gs").val(); // grayscale
        var blur = $("#blur").val(); // blur
        var br = $("#br").val(); // brightness
        var ct = $("#ct").val(); // contrast
        var huer = $("#huer").val(); //hue-rotate
        var opacity = $("#opacity").val(); //opacity
        var invert = $("#invert").val(); //invert
        var saturate = $("#saturate").val(); //saturate
        var sepia = $("#sepia").val(); //sepia

        $("#content_viewer img").css(
        "filter", 'grayscale(' + gs+
        '%) blur(' + blur +
        'px) brightness(' + br +
        '%) contrast(' + ct +
        '%) hue-rotate(' + huer +
        'deg) opacity(' + opacity +
        '%) invert(' + invert +
        '%) saturate(' + saturate +
        '%) sepia(' + sepia + '%)'
        );

        $("#content_viewer img").css(
        "-webkit-filter", 'grayscale(' + gs+
        '%) blur(' + blur +
        'px) brightness(' + br +
        '%) contrast(' + ct +
        '%) hue-rotate(' + huer +
        'deg) opacity(' + opacity +
        '%) invert(' + invert +
        '%) saturate(' + saturate +
        '%) sepia(' + sepia + '%)'
        );
    }
    //When sliders change image will be updated via editImage() function
    $("input[type=range]").change(editImage).mousemove(editImage);
    // Reset sliders back to their original values on press of 'reset'
    $('#imageEditor').on('reset', function () {
        setTimeout(function() {
            editImage();
        }, 0);
    });

    // DRAGGABLE
    dragElement(document.getElementById("content_viewer"));
    function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        elmnt.onmousedown = dragMouseDown;
        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }



    function updateCurrentPage(page){
        current_page = page;
    }

    // Load Thumbs
    function loadResults(sakme_id, current_page, per_page) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            url: "/sakmes/view-files-per-page",
            type: "post",
            async: "false",
            data: {
                delay: 3,
                sakme_id: sakme_id,
                current_page: current_page,
                per_page: per_page
            },
            beforeSend: function(xhr) {
                $("#thumbs").after($("<li class='loading'>Loading...</li>").fadeIn('slow')).data("loading", true);
            },
            success: function(data) {
                if(data.result === 'success'){
                    console.log(data);
                    // Append Data To DOM
                    $.each(data.data, function() {
                        $('#thumbs').append(
                                '<li class="img-element" id="thumb-'+this.index+'" index="'+this.index+'" elID="'+this.id+'">'+
                                    '<img src="data:image/'+this.mime_type + ';base64,'+ this.file_base_64 +'" />'+
                                '</li>'
                            );
                    });
                    updateCurrentPage(current_page + 1);
                    $('.totalCounter').html(data.total);
                    $('#maxImages').attr('maxImages', data.total);

                }
                else{
                    if(data.message === 'No More Files'){
                        alert('No More Files');
                    }
                }
                $(".loading").fadeOut('fast', function() {
                    $(this).remove();
                });

            }
        });
    };

    // Load More Content AJAX
    $('.scrollpane').on('scroll', function() {
        let list = $(this).get(0);
        if(list.scrollTop + list.clientHeight >= list.scrollHeight) {
            loadResults(sakme_id, current_page, per_page);
        }
    });

</script>
@endsection
